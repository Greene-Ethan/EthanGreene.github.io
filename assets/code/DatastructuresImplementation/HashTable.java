import java.util.Arrays;
public class HashTable{

    private int[] internal;
    private int size; // the number of elements that have been inserted into the HashTable
    private int prime;
    
    public HashTable(){
        this.internal = new int[10];
        this.prime = 7;
    }
    
    
    /**
     * @param elem: The element to add
     * @pre elem > 0: We will only insert positive numbers
     *
     * Use the hash function h(x) = 2 * prime * x + 3 (mod this.internal.length) to 
     * place elem. If h(elem) is already occupied, resolve the collision 
     * with linear probing.
     */
    public void add(int elem){
        int h = (2 * this.prime * elem + 3)%this.internal.length;
        boolean notPlaced = true;
        int linearAdd = h + 1;
        if(this.internal[h] > 0) {
            while(notPlaced){
                if(linearAdd > this.internal.length - 1){
                    int posInHash = checkBegAdd(h, elem);
                if(posInHash != -1){
                    this.internal[posInHash] = elem;
                    this.size++;
                    return;
                    }
                    else{
                    resize();
                    linearAdd = h;
                    }
            }
                else if(this.internal[linearAdd] == 0){
                    this.internal[linearAdd] = elem;
                    notPlaced = false;
                    this.size++;
                }
                linearAdd++;
            }
        }
        else{
            // I think this messes up linear probing
            this.internal[h] = elem;
            this.size++;
        }
    }
    
    
    /**
     * Double the size of this.internal if this.size > this.internal.length/2
     * Then update this.prime to be the largest prime < this.internal.length.     
     */ 
    private void resize(){
        int newSize = this.internal.length * 2;
        int[] newArray = new int[newSize];
        for(int i = 0; i < this.internal.length; i++){
            int checkVal = this.internal[i];
            if(this.prime < checkVal && checkVal < newSize){this.prime = checkVal;}
            newArray[i] = checkVal;
        }
        this.internal = newArray;
    }
    
    /**
     * @param elem: The element to search for
     * @pre elem > 0
     * @return booolean: Whether elem is in the HashTable
     *
     * Use the same hash function from add() to search for elem.
     * Then use the linear probing strategy if elem is not found at h(elem).
     */ 
    public boolean contains(int elem){
        int h = (2 * this.prime * elem + 3)%this.internal.length;
        int linearAdd = h + 1;
        boolean notPlaced = true;
        // NEED TO ADD SOMETHING THAT CHECKS IF AT END THEN GOES BACK TO LOOP UNTIL BEGGINNING
        if(this.internal[h] != elem) {
            while(notPlaced){
                if(linearAdd > this.internal.length - 1)
                {
                if(checkBeg(h, elem) != -1){return true;}
                else{return false;}
                }
                else if(this.internal[linearAdd] == elem){
                    return true;
                }
                linearAdd++;
            }
        }
        else{
            return true;
        }
        return false;
    }
    
    //checks beggining using linear probing
    public int checkBeg(int h, int elem){
        for(int i = 0; i < h; i++){
            if(this.internal[i] == elem){
                return i;
            }
        }
        return -1;
    }
    
    public int checkBegAdd(int h, int elem){
        for(int i = 0; i < h; i++){
            if(this.internal[i] == 0){
                return i;
            }
        }
        return -1;
    }
    
    /**
     * @param elem: The element to remove
     * @pre elem > 0
     *
     * Use the same hash function from add() to search for elem.
     * Then use the linear probing strategy if elem is not found at h(elem).
     * If the element exists at position i, set internal[i] = 0.
     */
    public void remove(int elem){
        int h = (2 * this.prime * elem + 3)%this.internal.length;
        int linearAdd = h + 1;
        boolean notPlaced = true;
        // NEED TO ADD SOMETHING THAT CHECKS IF AT END THEN GOES BACK TO LOOP UNTIL BEGGINNING
        if(this.internal[h] != elem) {
            while(notPlaced){
                if(linearAdd > this.internal.length - 1)
                {
                int posInHash = checkBeg(h, elem);
                if(posInHash == -1){return;}
                else{this.internal[posInHash] = 0; return;}
                }
                else if(this.internal[linearAdd] == elem){
                    this.internal[h] = 0;
                    this.size--;
                }
                linearAdd++;
            }
        }
        else{
            this.internal[h] = 0;
            this.size--;
            return;
        }
        System.out.println("Elem not found");
    }
    
    
    public int size(){
        return this.size;
    }
    
    
    /**
     * DO NOT MODIFY
     */
     public String toString(){
         return java.util.Arrays.toString(this.internal);
     }
}
