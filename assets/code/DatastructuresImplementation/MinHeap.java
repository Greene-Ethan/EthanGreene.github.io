import java.util.*;
import java.lang.Math;
/**
 * @author Michael Levet
 * @date 10/25/2023
 */
 
 // The syntax <T extends Comparable<? super T>> ensures
 // that any two elements will be mutually comparable
public class MinHeap<T extends Comparable<? super T>>{
    T[] internal = (T[])new Comparable[10];
    private int size = 0; // recall that internal.length might be > the number of elements in the MinHeap
    
    public MinHeap(){
        this.size = 0;
    }
    
    /** 
     * @param arr 
     *
     * Iteratively add the elements of arr to this MinHeap.
     * Note that the elements of arr may not be in an order
     * that respects the Heap property.
     */
    public MinHeap(T[] arr){
        for(int i =0; i<arr.length -1; i++){
            if(arr[i] == null){
                continue;
            }
            add(arr[i]);
        }
    }
    
    /**
     * @param elem: The element to insert into the MinHeap, resizing
     *                this.internal if necessary.
     */ 
    public void add(T elem){
        //System.out.print("size = ");
        //System.out.println(this.size);
        if(this.size == 0){
            this.internal[0] = null;
            this.internal[1] = elem;
            this.size++;
            this.size++;
            return;
        }
        else if(this.size + 1 > this.internal.length){
            resize();
        }
        //System.out.println("elem To Add " + elem);
        //System.out.println(this.size + "S     E: " + elem);
        this.internal[size] = elem;
        int index = this.size++;
        //this.internal.get(index);
        //System.out.println("END LOOP");
        //System.out.print("size = ");
        //System.out.println(this.size);
        //System.out.println(index);
        //System.out.println(indexOfParent(index));
        //System.out.print("Parent: ");
        //System.out.println(this.internal[indexOfParent(index)]);
        //System.out.println(this.internal[index]);
        //System.out.println("Index="+index);
        //System.out.println(this.internal.length);
        int checkInd = indexOfParent(index);
        if(this.internal[index] == null){
            return;
        }
        while(this.internal[index].compareTo(this.internal[indexOfParent(index)]) < 0){
            //System.out.print("INLOOP Parent: ");
            //System.out.println(this.internal[indexOfParent(index)]);
            //System.out.println(this.internal[index]);
            T temp = this.internal[index];
            this.internal[index] = this.internal[indexOfParent(index)];
            this.internal[indexOfParent(index)] = temp;
            int parent = indexOfParent(index);
            if(parent <= 1){
                break;
            }
            else{
                index = indexOfParent(index);
            }
        }
        //System.out.print("[ ");
        for(int i = 0; i < this.size; i++){
            //System.out.print(this.internal[i] +", ");
        }
        //System.out.print(" ]");
    }
    
    private void resize(){
        int newSize = this.internal.length * 2;
        T[] newArray = (T[])new Comparable[newSize];
        for(int i = 0; i < this.internal.length; i++){
            newArray[i] = this.internal[i];
        }
        this.internal = newArray;
    }
    
    public int indexOfParent(int index){
        return(int)((Math.ceil((index-1)/2.0)));
    }
    
    public int leftChild(int index){
        return (index*2);
    }
    
    public int rightChild(int index){
        return (index*2) + 1;
    }
    
    /**
     * @return T The element at the top of the MinHeap, which 
     *             is also the minimum element present.
     * 
     */ 
    
    public T removeMin(){
        ArrayList<T> tempList = new ArrayList<T>();
        T removed = this.internal[1];
        this.internal[1] = this.internal[size-1];
        this.size--;
        heapify(1);
        return removed;
    }
    
    private void heapify(int index){
        int leftChildI = leftChild(index);
        int rightChildI = rightChild(index);
        int minInd;
        //System.out.println("l:" + leftChildI);
        //System.out.println("R:" + rightChildI);
        if(rightChildI > this.size()){
            if(leftChildI > this.size()){
                return;
            }
            else{
                minInd = leftChildI;
            }
        }
        else{
            if(this.internal[leftChildI].compareTo(internal[rightChildI]) <= 0){
                minInd = leftChildI;
            }else{
                minInd = rightChildI;
            }
        }
        if(this.internal[index].compareTo(this.internal[minInd]) > 0){
            T temp = this.internal[index];
            this.internal[index] = this.internal[minInd];
            this.internal[minInd] = temp;
            heapify(minInd);
        }
        
    }
    
    
    
    /**
     * @return int The number of elements in the MinHeap
     */ 
    public int size(){
        return this.size;
    }
    
    
    /**
     * @return T[] A sorted array from the elements of this MinHeap
     *               
     * Inside the method, create a new MinHeap which is a deep copy of 
     * this MinHeap (please review shallow copy vs. deep copy from 221).
     * Then using your new MinHeap, iteratively use removeMin() to 
     * place the elements in a sorted array. This is the Heapsort algorithm.
     */     
     public T[] heapsort(){
         T[] returnList = (T[])new Comparable[this.size];
         int loopTime = this.size;
         //System.out.print("LENGTH=" + (this.internal.length - this.size));
         for(int i = 0; i < loopTime - 1; i++){
             returnList[i] = removeMin();
             //System.out.print(returnList[i] + ", ");
         }
         //System.out.print(" ]");
         return returnList;
     }
    
}
