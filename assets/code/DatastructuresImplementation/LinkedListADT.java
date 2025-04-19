public class LinkedListADT<T> implements ListADT<T> {

    class Node<T>{
        Node<T> previous, next;
        T elem;
        
    }

    private Node<T> head, tail;
    
    
    public LinkedListADT(){
        this.head = this.tail = null;
    }
    
    
    
    public String toString(){
        if(this.head == null){
            return "[]";
        }
        
        else if(this.head.next == null){
            return "[" + this.head.elem + "]";
        }
        
        Node<T> temp = this.head;
        String str = "[";
        while(temp.next != null){
            str += temp.elem.toString() + ", ";
            temp = temp.next;
        }
        
        str += temp.elem.toString() + "]";
        return str;
    }
    
    
    /**
     * @param elem: The element to add to the end of the list
     */ 
    public void add(T elem){
        if(this.head == null){
            this.head = new Node<T>();
            this.head.elem = elem;
            this.tail = this.head;
        }
        
        else{
            this.tail.next = new Node<T>();
            this.tail.next.previous = this.tail;
            this.tail = this.tail.next;
            this.tail.elem = elem;
        }
        
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
        Node<T> temp = this.head;
        int i = 0;
        Node<T> insertNode = new Node<T>();
        if(index == 0){
            insertNode.next = temp;
            temp.previous = insertNode;
            this.head = insertNode;
            insertNode.elem = elem;
        }
        if(index > size()){
            System.out.print("The index you gave us is bigger than our list!");
        }
        else {
            while(temp != null){
                if(i == index - 1){
                    insertNode.next = temp.next;
                    insertNode.previous = temp;
                    temp.next = insertNode;
                    temp.next.previous = insertNode;
                    insertNode.elem = elem;
                }
                i++;
                temp = temp.next;
            }
        }
    }
    
    
    
    /**
     * @param index: The index of the element to return
     * @return T: The element located at @index to return
     */
    public T get(int index){
        Node<T> temp = this.head;
        int i = 0;
        while(temp != null){
            if(i == index){
                return temp.elem;
            }
            temp = temp.next;
            i++;
        }
        System.out.print("Error, Index out of bounds");
        return null;
    }
    
    
    /**
     * @param elem: The element we want to check for membership in the list.
     * @return boolean: true if elem is in the list, and false otherwise
     */ 
    public boolean contains(T elem){
        Node<T> temp = this.head;
        int i = 0;
        while(temp != null){
            if(temp.elem.equals(elem)){
                return true;
            }
            temp = temp.next;
        }
        return false;
    }
    
    
    /**
     * @param elem: The element we want to check for membership in the list.
     * @return int: The index of the first occurrence of elem, or -1 if elem is not in the list.
     */ 
    public int findFirstOccurrence(T elem){
        Node<T> temp = this.head;
        int i = 0;
        while(temp != null){
            if(temp.elem.equals(elem)){
                return i;
            }
            i++;
            temp = temp.next;
        }
        return -1;
    }
    
    
    /**
     * @param elem: The element we want to check for membership in the list.
     * @return int: The index of the first occurrence of elem starting from fromIndex (inclusive), 
     *                or -1 if elem is not in the list.
     */ 
    public int findFirstOccurrenceSince(int fromIndex, T elem){
        Node<T> temp = this.head;
        int i = fromIndex;
        while(temp != null ){
            if(temp.elem.equals(elem) && i >= fromIndex){
                return i - fromIndex;
            }
            i++;
            temp = temp.next;
        }
        return -1;
    }
    
    
    /**
     * @param elem: The element we want to check for membership in the list.
     * @return int: The index of the last occurrence of elem, or -1 if elem is not in the list.
     */ 
    public int findLastOccurrence(T elem){
        Node<T> temp = this.head;
        int i = 0;
        int target = -1;
        
        while(temp != null ){
            if(temp.elem.equals(elem)){
                target = i;
            }
            i++;
            temp = temp.next;
        }
        return target;
    }
    
    
    /**
     * Removes the first occurrence of @elem, if it exists in the list.
     *
     * @param elem: The element we wish to remove
     * @return int: The index of the first occurrence of elem prior to its removal, or -1 if
                    @elem is not in the list.
     */
    public int remove(T elem){
        Node<T> temp = this.head;
        int i = 0;
        int target = -1;
        while(temp != null){
            if(temp.elem.equals(elem) && temp.next == null){
                target = i;
                temp.previous.next = temp.next;
                this.tail = temp.previous;
            }
            else if(i == 0 && temp.elem.equals(elem)){
                target = i;
                this.head = temp.next;
            }
            else if(temp.elem.equals(elem)){
                target = i;
                temp.previous.next = temp.next;
                temp.next.previous = temp.previous;
            }
            i++;
            temp = temp.next;
        }
        if(target == -1){
            return target;
        }
        return target;
    }
    
    
    /**
     * Removes the element at @index.
     *
     * @param index: The position of the element to remove
     * @return T: The element removed from the list
     */
    public T remove(int index){
        Node<T> temp = this.head;
        int i = 0;
        T target = null;
        if(index == 0){
            this.head = this.head.next;
        }
        if(index > size()){
            System.out.print("I can't remove any value from that index because it is out of bounds!");
            return target;
        }
        while(temp != null){
            if(temp.next == null && i == index){
                target = temp.elem;
                temp.previous.next = temp.next;
                this.tail = temp.previous;
                return target;
            }
            else if(temp.previous == null && i == index){
                this.head = temp;
            }
            else if(i == index){
                target = temp.elem;
                temp.previous.next = temp.next;
                temp.next.previous = temp.previous;
                return target;
            }
            i++;
            temp = temp.next;
        }
        System.out.println("Error, index out of bounds");
        return target;
    }
    
    
    /**
     * Removes all instances of @elem from the list.
      *
     * @param elem: The element to remove from the list.
     */
    public void removeAll(T elem){
        Node<T> temp = this.head;
        int i = 0;
        while(temp != null){
            if(temp.elem.equals(elem)){
                remove(elem);
            }
            i++;
            temp = temp.next;
        }
    }
    
    /**
     * @return int: The number of elements in the list.
     */ 
    public int size(){
        Node<T> temp = this.head;
        int acc = 0;
        while(temp != null){
            acc++;
            temp = temp.next;
        }
        return acc;
    }
}
