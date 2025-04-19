#include <stdio.h>    /* for printf */
#include <stdlib.h>   /* for string to integer conversion, random numbers */
#include "mem.h"

/*
  The main program will accept four paramemters on the command line.
  The first parameter is the memory size.  The second parameter is the
  duration of the each simulation run.  The third parameter is the
  number of times to repeat each experiment (ie. number of runs). The
  fourth parameter is a random number seed. Here is an example command
  line:

  ./hw7 1000 3000 100 1235

  This means that your program should initialize physical memory to
  1,000 units, perform 100 runs with each run taking 3000 units of
  time, and the random number generator should be seeded (one time)
  with the value 1235.
*/

int main(int argc, char** argv)
{  
  /*Params: Size of memory, Num runs, time steps per run, Random seed */ 
  if(argc < 5){
    printf("Incorrect calling of function. Please use in format: ./hw5 SizMemory NumRuns timeStepsPerRun RandomSeed");
    return 1;
  }
  
  // assigning my variables
  int memSize = atoi(argv[1]);
  int numRuns = atoi(argv[2]);
  int timeStepsPerRun = atoi(argv[3]);
  int seed = atoi(argv[4]);
  int probesPerRun = 0;
  int process = 0;
  int duration;
  int memAlocOut;
  // make sure to call mem_clear after each run 
  mem_init(memSize);
  
  srand(seed);
  enum mem_strats {FIRSTFIT=0, NEXTFIT=1, BESTFIT=2};
  
  int printProbes = 0;
  int printFails = 0;
  int printFrags = 0;
  int failuresPerRun = 0;
  int fragmentations = 0;
  
  printf("Average: Probes_Per_Run  Failures_Per_Run  Fragmentations_Per_Run\n");
  for(int strat=0; strat<= 2; strat++){
    for(int runIndex = 0; runIndex < numRuns; runIndex++){
      for(int i = 0; i < timeStepsPerRun; i++){
        //mem_print();
        process = MIN_REQUEST_SIZE + rand() % (MAX_REQUEST_SIZE - MIN_REQUEST_SIZE + 1);
        duration = MIN_DURATION + rand() % (MAX_DURATION - MIN_DURATION + 1);
        
        if(strat == 0){
        memAlocOut = mem_allocate(FIRSTFIT, process, duration);
        } // First fit
        
        if(strat == 1){
        memAlocOut = mem_allocate(NEXTFIT, process, duration);
        } //Next fit
        
        if(strat ==2 ){
        memAlocOut = mem_allocate(BESTFIT, process, duration);
        //mem_print();
        } //Best fit
        
        if(memAlocOut != -1) {probesPerRun += memAlocOut; }
        else{
        failuresPerRun++;
        }
        
        fragmentations += mem_fragment_count(MIN_REQUEST_SIZE); 
        
        mem_single_time_unit_transpired();
        
      }
    }
    
    printProbes = probesPerRun / numRuns;
    printFails = failuresPerRun / numRuns;
    printFrags = fragmentations / numRuns;
    
    
    char* stratName;
    if(strat == 0){stratName = "First Fit";}
    else if(strat == 1){stratName = "Next Fit";}
    else{stratName = "Best Fit";}
    
    printf("%s:      %d                %d                  %d           \n",stratName,printProbes,printFails,printFrags);
    fflush(stdout);
    
    
    //printf("Just probes: %d\n",probesPerRun);
    //printf("Just fails: %d\n",failuresPerRun);
    //printf("Just frags: %d\n",fragmentations);
    printProbes = 0;
    printFails = 0;
    printFrags = 0;
    probesPerRun = 0;
    failuresPerRun = 0;
    fragmentations = 0;
    mem_clear();
    
    }
  mem_free();
  return 0;
}
