/**
 * @author Ethan Greene
 * @date August 29, 2023
 *
 * Honor Code: While it is permitted to discuss with
 * your classmates, all code should be written by you and not copied
 * (even if you retype) from any other source. 
 */
public class ArrayListADT<T> implements ListADT<T> {

    // The internal array that we manage
    private T[] internal;
    private int length;
    
    
    /**
     * Instantiate a new ArrayListADT.
     * The internal array should be initialized to
     * store 100 elements.
     */ 
        
    @SuppressWarnings("unchecked") 
    public ArrayListADT(){
        internal = (T[])new Object[100];
        
        // note that even though this.internal.length = 100,
        // there are no elements in the ArrayListADT. So
        // we initialize this.length = 0
        this.length = 0; 
    }
    
    /**
     * Instantiate a new ArrayListADT.
     * The internal array should be initialized to
     * store @size elements.
     */ 
    public ArrayListADT(int size){
            internal = (T[])new Object[size];

            this.length = 0; 
    }
    
    /**
     * Instantiate a new ArrayListADT.
     * The internal array should be initialized 
     * to store @arr.length many elements, and then
     * the elements of @arr should be copied over
     * to internal. Do *NOT* set internal = arr; as 
     * this causes internal to point to arr.
     */ 
    public ArrayListADT(T[] arr){
        int mySize = arr.length;
        internal = (T[])new Object[mySize];
        for(int i = 0; i < arr.length; i++){
                    internal[i] = arr[i];
                    this.length++;
                }
    }
    
    private void resize(){
        @SuppressWarnings("unchecked")
        T[] temp = (T[])(new Object[2 * internal.length]); 
        for(int i = 0; i < internal.length; i++){
            temp[i] = internal[i];
        }
        
        internal = temp;
    }
    
    /**
     * @param elem: The element to add to the end of the list
     */ 
    public void add(T elem){
        if(this.length == internal.length){
            resize();
        }
        for(int i = 0; i < internal.length; i++){
            if(i == this.length){
                internal[i] = elem;
            }
        }
        this.length++;
    }
    
    /**
     * @param index: The index at which to insert the new element
     * @param elem: The element to insert inot the list at position @index.
     * 
     * Inserts @elem at position @index in the list. Any element at position @index
     * or later in the list prior to this method being invoked should be moved
     * one index down (so the element at position @index prior to this method being invoked
     * should end up at position @index+1 after this method terminates).
     */
    public void add(int index, T elem){
        if(this.length == internal.length && index > internal.length - 1){
            resize();
        }
        for(int i = this.length - 1; i >= index; i--){
            internal[i+1] = internal[i];
        }
        internal[index] = elem;
        this.length++;
    }
    
    /**
     * @param index: The index of the element to return
     * @return T: The element located at @index to return
     */
    public T get(int index){
        if(index < size()){
            return (T)(internal[index]);
        }
        
        throw new IndexOutOfBoundsException("The ArrayListADT has size " + size() + ". The parameter index: " + index + " exceeds this size.");
    }
    
    
    /**
     * @param elem: The element we want to check for membership in the list.
     * @return boolean: true if elem is in the list, and false otherwise
     */ 
    public boolean contains(T elem){
        for(int i = 0; i < this.length; i++){
            if(internal[i].equals(elem)){
                return true;
            }
        }
        return false;
    }
    
    
    /**
     * @param elem: The element we want to check for membership in the list.
     * @return int: The index of the first occurrence of elem, or -1 if elem is not in the list.
     */ 
    public int findFirstOccurrence(T elem){
        for(int i = 0; i < this.length; i++){
            if(internal[i].equals(elem)){
                return i;
            }
        }
        return -1;
    }
    
    
    /**
     * @param elem: The element we want to check for membership in the list.
     * @return int: The index of the first occurrence of elem starting from fromIndex (inclusive), 
     *                or -1 if elem is not in the list.
     */ 
    public int findFirstOccurrenceSince(int fromIndex, T elem){
        if(fromIndex < this.length){
            return -1;
        }
        for(int i = fromIndex; i < this.length; i++){
            if(internal[i] == null){
                return -1;
            }
            if(internal[i].equals(elem)){
                return i;
            }
        }
        return -1;
    }
    
    
    /**
     * @param elem: The element we want to check for membership in the list.
     * @return int: The index of the last occurrence of elem, or -1 if elem is not in the list.
     */ 
    public int findLastOccurrence(T elem){
        for(int i = this.length - 1; i >= 0; i--){
            if(internal[i].equals(elem)){
                return i;
            }
        }
        return -1;
    }
    
    
    /**
     * Removes the first occurrence of @elem, if it exists in the list.
     *
     * @param elem: The element we wish to remove
     * @return int: The index of the first occurrence of elem prior to its removal, or -1 if
                    @elem is not in the list.
     */
    public int remove(T elem){
        int index = -1;
        for(int j = 0; j < this.length; j++){
            if(internal[j].equals(elem)){
                index = j;
                break;
            }
        }
        for(int i = index; i < this.length; i++){
            internal[i] = internal[i+1];
        }
        this.length--;
        return index;
    }
    
    
    /**
     * Removes the element at @index.
     *
     * @param index: The position of the element to remove
     * @return T: The element removed from the list
     */
    public T remove(int index){
        T element = internal[index];
        for(int i = index; i < this.length; i++){
            internal[i] = internal[i+1];
        }
        this.length--;
        return element;
    }
    
    
    /**
     * Removes all instances of @elem from the list.
     *
     * @param elem: The element to remove from the list.
     */
    public void removeAll(T elem){
        while(findFirstOccurrence(elem) != -1){
            int index = findFirstOccurrence(elem);
            remove(index);
            this.length--;
        }
    }
    
    /**
     * @return int: The number of elements in the list.
     */ 
    public int size(){
        int size = 0;
        for(int i = 0; i < this.length; i++){
            if(!(internal[i] == null)){
                size++;
            }
        }
        return size;
    }
    
    /**
     * Instructor Note: DO NOT MODIFY
     */
    public String toString(){
        if(this.length == 0){
            return "[]";
        }
        
        String test = "[";
        for(int i = 0; i < this.length-1; i++){
            test += internal[i].toString() + ", ";
        }
        
        test += internal[this.length-1].toString() + "]";
        return test;
    }   
    
    /*
     * Reverses all values in an array and like a clap it does so by meeting 
     * in the middle
     */
    public T[] clappyConverge(){
        int counter = 0;
        int myVar = this.length - 1;
        T[] temp = (T[])(new Object[this.length]);
        for(int i = (this.length / 2) ;i >= 0; i--){
            temp[myVar] = internal[counter];
            temp[counter] = internal[myVar];
            counter++;
            myVar--;
            }
        return temp;
    }
    
    public void selectionSort(){
        T temp;
        int max;
        for(int i=0; i < this.length - 1; i ++){
            max = 0; // set the index value of max to the first index
            for(int j=0; j < this.length - i; j++) {
                if((int)internal[j] > (int)internal[max]){ // type cast types to int to allow boolean opperations
                    max = j; 
                }
            }
            temp = internal[this.length - 1 - i]; // set temp value equal to value about to be swapped
            internal[this.length-1-i] = internal[max];
            internal[max] = temp;
        }
    }   
    // {7, 6 ,3 ,72 ,4 ,23, 15}
    public int[] bubbleSort(int[] arr){
        int temp;
        for(int i = 0; i < arr.length - 1; i++){
            for(int j = 0; j < arr.length - i - 1; j++){
                if(arr[j] > arr[j+1]){
                    temp = arr[j];
                    arr[j] = arr[j+1];
                    arr[j+1] = temp;
                }
            }
        }
        return arr;
    }
}
