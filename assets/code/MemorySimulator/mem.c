#include <stdio.h>    /* for printf statements when debugging */
#include <stdlib.h>   /* for malloc() and free() */
#include "mem.h"

/*
  Physical memory array. This is a static global array for all
  functions in this file.  An element in the array with a value of
  zero represents a free unit of memory.
*/
static dur_t* memory;

/*
 The size (i.e. number of units) of the physical memory array. This is
 a static global variable used by functions in this file.
 */
static int mem_size;


/*
 The last_placement_position variable contains the end position of the
 last allocated unit used by the next fit placement algorithm.
 */
static int last_placement_position;

/*
  Using the memory placement algorithm, strategy, allocate size
  units of memory that will reside in memory for duration time units.

  If successful, this function returns the number of contiguous blocks
  (a block is a contiguous "chunk" of units) of free memory probed while 
  searching for a suitable block of memory according to the placement 
  strategy specified.  If unsuccessful, return -1.

  If a suitable contiguous block of memory is found, the first size
  units of this block must be set to the value, duration.
 */
int mem_allocate(mem_strats_t strategy, int size, dur_t duration)
{
  if(size > mem_size || size < 1){return -1;}
  int blockSize = 0;
  int blocksProbed = 0;
  if(strategy == 0){
    for(int i = 0; i < mem_size; i++){
      if(memory[i] == 0){ //free block in memory
        blockSize = get_contiguous_blocksize(i); // find end of the blocksize
        blocksProbed++;
        if(blockSize >= size){ 
          for(int j = i; j < size + i; j++){
            //printf("j loop: %d\n",j);
            memory[j] = duration;
          }
          return blocksProbed; //probes
        }
        i += blockSize - 1;  //if blockSize isn't small enough then skip it
      }
    }
    return -1; //failures
  }
  else if(strategy == 1){
    //printf("not inside\n");
    for(int i = last_placement_position; (i - last_placement_position) < mem_size; i++){
      //printf("inside\n");
      if(memory[(i%mem_size)] == 0){ //free block in memory
        blockSize = get_contiguous_blocksize((i%mem_size)); // find end of the blocksize
        blocksProbed++;
        if(blockSize >= size){ 
          for(int j = (i%mem_size); j < size + (i%mem_size); j++){
            //printf("j loop: %d\n",j);
            memory[j] = duration;
            last_placement_position = j;
          }
          return blocksProbed; //probes
        }
        i += blockSize - 1;  //if blockSize isn't small enough then skip it
      } 
    }
    return -1; //failures
  }
  else if(strategy == 2){
    int bestFit = -1;
    int bestFitFound = 0;
    for(int i = 0; i < mem_size; i++){
      if(memory[i] == 0){ //found empty memory
        blockSize = get_contiguous_blocksize(i); 
        blocksProbed++;
        //i += (blockSize - size);
        
        //printf("i: %d\n",i);
        //printf("Memory[i] before = %d\n",memory[i]);
        if(blockSize >= size){
          if(bestFit == -1 || blockSize < get_contiguous_blocksize(bestFit)){           // found a Fit
            bestFit = i;                // indexing bestFit
            bestFitFound = 1;
            //printf("blockSize: %d  size: %d\n",blockSize, size);
            //printf("bestFit: %d \n",bestFit);
            }
          if(blockSize == size){
            bestFit = i;
            for(int j = 0; j < size; j++){
              //printf("bestFit index: %d\n", bestFit + j);
              memory[bestFit + j] = duration;
            }
            return blocksProbed;
          }
        }
        i += blockSize - 1;  //if blockSize isn't small enough then skip it
        //printf("i = %d\n",i);
      }
      //done searching for fits
    }
    if(bestFitFound){
      //printf("size: %d\n", size);
      for(int j = 0; j < size; j++){
              //printf("bestFit index: %d\n", bestFit + j);
              memory[bestFit + j] = duration;
        }
        return blocksProbed;
      }
    } //put process into memory
    return -1;
}
/*
  Go through all of memory and decrement all positive-valued entries.
  This simulates one unit of time having transpired.  NOTE: when a
  memory cell is decremented to zero, it becomes "unallocated".
 */
int mem_single_time_unit_transpired()
{
  for(int i = 0; i < mem_size; i++){
    if(memory[i] != 0){
      memory[i]--;
    }
  }
  return 1; // done decrementings
}

/*
  Return the number of fragments in memory.  A fragment is a
  contiguous free block of memory of size less than or equal to
  frag_size.
 */
int mem_fragment_count(int frag_size)
{
  int fragCount = 0;
  int blockSize;
  for(int i = 0; i < mem_size; i++){
    if(memory[i] == 0){
      blockSize = get_contiguous_blocksize(i);
      if(blockSize < frag_size){
        fragCount++;
      }
      i += blockSize - 1;
    }
  }
  return fragCount;
}

/*
  Set the value of zero to all entries of memory.
 */
void mem_clear()
{
  for(int i = 0; i < mem_size; i++){
      memory[i] = 0;
    }
}

/*
 Allocate physical memory to size. This function should 
 only be called once near the beginning of your main function.
 */
void mem_init(int size)
{
  memory = malloc(sizeof(dur_t)*size);
  mem_size = size;
}

/*
 Deallocate physical memory. This function should 
 only be called once near the end of your main function.
 */
void mem_free()
{
  free(memory);
}

/* returns size of contiguous block starting at position, pos */

int get_contiguous_blocksize(int pos)
{
  int start = pos;
  int val = memory[pos];
  
  do {
    pos++;
  } while (pos < mem_size && memory[pos] == val);

  return pos - start;
}

/*
  Print memory for testing/debugging purposes.  You will need to test
  and debug your allocation algorithms.  Calling this routine in your
  main() after every allocation (successful or not) will help in this
  endeavor.  NOTE: you should print the memory contents in contiguous
  blocks, rather than single units; otherwise, the output will be very
  long.
 */
void mem_print()
{
  int i = 0;
  int blocksize;

  printf("  start size dur\n");
  while (i < mem_size) {
    blocksize = get_contiguous_blocksize(i);
    printf("%5d %5d %3d\n", i, blocksize, memory[i]);
    i += blocksize;
  }
  printf("\n");
}
