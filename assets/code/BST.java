import java.util.Stack;
 
 // The syntax <T extends Comparable<? super T>> ensures
 // that any two elements will be mutually comparable
public class BST<T extends Comparable<? super T>>{
    class Node<T>{
        Node<T> left, right;
        T elem;
        Node(){
            this.left = null;
            this.right = null;
        }
        
        
        /**
         * Instructor Note: DO NOT MODIFY
         */
        public String toString(){
            String leftString = "[Left: ";
            String rightString = "[Right: ";
            String str = "";
            
            if(left != null){
                leftString = leftString + left.toString();
            }
            
            if(right != null){
                rightString = rightString + right.toString();
            }
            
            leftString += "]";
            rightString += "]";
            
            return leftString + ", " + elem + ", " + rightString;
            
        }
    }
    int size;
    private Node<T> root;
    /**
     * @param elem: The element to insert into the tree
     *
     * Implement a method to insert elem into the BST.
     * Make sure to implement your method **iteratively**
     * rather than using recursion.
     */ 
    public void add(T elem){
        boolean notPlaced = true;
        if(this.root == null){
            this.root = new Node<T>();
            this.root.elem = elem;
            size++;
            return;
        }
        Node<T> temp = this.root;
        while(notPlaced){
            if(elem.compareTo(temp.elem) > 0){
                if((temp.right == null)){
                    temp.right = new Node<>();
                    temp.right.elem = elem;
                    this.size++;
                    notPlaced = false;
                }
                else{
                    temp = temp.right;
                }
            }
            else if(elem.compareTo(temp.elem) < 0){
                if((temp.left == null)){
                    temp.left = new Node<>();
                    temp.left.elem = elem;
                    this.size++;
                    notPlaced = false;
                }
                else{
                    temp = temp.left;
                }
            }
            else{
                return; 
            }
        }
    }
    
    
    /**
     * @param elem: The element to remove from the tree.
     * 
     * Removes the first instance of elem found in the tree, as follows
     *        - If elem is at the root, then remove the root
     *        - Else if elem is in the left subtree, then remove elem from the left subtree (applying this rule to the left subtree)
     *        - Else if elem is in the right subtree, then remove elem from the right subtree (applying this rule to the right subtree)
     *
     * Implement your method **iteratively** rather than using recursion
     */
    public void remove(T elem){
        boolean notPlaced = true;
        Node<T> temp = root;
        Node<T> myNode = null;
        while(notPlaced){
            if(elem.compareTo(temp.elem) > 0){
                if(temp.right == null && temp.left == null){
                    return;
                }
                else if(temp.right.elem.compareTo(elem) == 0){
                    Node<T> tempRemove = temp.right;
                    int leftMost = 0;
                    //System.out.println(temp.elem);
                    while(tempRemove.right != null ){
                        if(leftMost == 0 && tempRemove.left !=null){
                            tempRemove = tempRemove.left;
                            leftMost++;
                        }
                        else{
                            tempRemove = tempRemove.right;
                            leftMost++;
                        }
                    }
                    myNode = temp.right;
                    //System.out.print(myNode);
                    if(myNode.left == null && myNode.right == null){
                        removeCase1(temp, elem);
                        this.size--;
                        return;
                    }
                    else if(!(myNode.left != null && myNode.right != null)){
                        removeCase2(temp, elem);
                        this.size--;
                        return;
                    }
                    else{
                        removeCase3(temp, tempRemove, elem, myNode);
                        this.size--;
                        return;
                    }
                }
                else{
                    temp = temp.right;
                }
            }
            else if(elem.compareTo(temp.elem) < 0){
                if(temp.right == null && temp.left == null){
                    return;
                }
                else if(temp.left.elem.compareTo(elem) == 0 ){
                    Node<T> tempRemove = temp.left;
                    int leftMost = 0;
                    //System.out.println(temp.elem);
                    while(tempRemove.right != null ){
                        if(leftMost == 0 && tempRemove.left !=null){
                            tempRemove = tempRemove.left;
                            leftMost++;
                        }
                        else{
                            tempRemove = tempRemove.right;
                            leftMost++;
                        }
                    }
                    myNode = temp.left;
                    if(myNode.left == null && myNode.right == null){
                        removeCase1(temp, elem);
                        this.size--;
                        return;
                    }
                    else if(!(myNode.left != null && myNode.right != null)){
                        removeCase2(temp, elem);
                        this.size--;
                        return;
                    }
                    else{
                        removeCase3(temp, tempRemove, elem, myNode);
                        this.size--;
                        return;
                    }
                }
                else{
                    temp = temp.left;
                }
            }
            else{
                return;
            }
        }
    }
    //Case 1: no nodes below our node to be removed.
    public void removeCase1(Node<T> temp, T elem){
        if(temp.right.elem.compareTo(elem) == 0){
            temp.right = null;
        }
        else{
            temp.left = null;
        }
    }
    //Case 2: one node below our node to be removed.
    public void removeCase2(Node<T> temp, T elem){
        if(temp.right.elem.compareTo(elem) == 0){
            if(temp.right.right != null){
                temp.right = temp.right.right;
            }
            else if(temp.right.left != null){
                temp.right = temp.right.left;
            }
        }
        else{
            if(temp.left.right != null){
                temp.left = temp.left.right;
            }
            else if(temp.left.left != null){
                temp.left = temp.left.left;
            }
        }
    }
    //Case 3: Two nodes below our node to be removed.
    public void removeCase3(Node<T> temp, Node<T> tempRemove, T elem, Node<T> myNode){
        myNode.elem = tempRemove.elem;
        int leftMost = 0;
        boolean notRemoved = true;
        while(notRemoved){
           if(leftMost == 0 && myNode.left.elem !=null){
                if(myNode.left.right == null){
                    myNode.left = null;
                    notRemoved = false;
                }
                myNode = myNode.left;
                leftMost++;
                }
            else{
                if(myNode.right.right == null){
                    myNode.right = null;
                    notRemoved = false;
                }
                myNode = myNode.right;
                leftMost++;
           }
        }
    }
    
    
    /**
     * @param elem: The element to search for in the tree
     * @return boolean: true if elem exists, and false otherwise
     *
     * Implement your method **iteratively** rather than using recursion
     */
    public boolean contains(T elem){
        boolean notFound = true;
        Node<T> temp = root;
        
        while(temp != null){
            if(elem.compareTo(temp.elem) > 0){
                if(temp.right == null){
                    return false;
                }
                else if(temp.right.elem.compareTo(elem) == 0){
                    return true;
                }
                else{
                    temp = temp.right;
                }
            }
            else if(elem.compareTo(temp.elem) < 0){
                if(temp.left == null){
                    return false;
                }
                else if(temp.left.elem.compareTo(elem) == 0){
                    return true;
                }
                else{
                    temp = temp.left;
                }
            }
            else{
                return true;
            }
        }
        return false;
    }
    
    
    /**
     * @return int, the number of elements in the tree
     *
     * This method should take O(1) steps; think about how to use a 
     * size instance variable.
     */
    public int size(){
        return this.size;
    }
    
    
    /**
     * @return String: A comma-separated sequence corresponding 
     *                   to the inorder traversal of the tree
     *
     * You may **not** use recursion to implement this method.
     * You are, however, welcome to use the java.util.Stack class.
     * You can als create private helper methods, but those methods
     * cannot use recursion.
     */ 
    public String inOrder(){
        Node<T> temp = root;
        Stack<Node> stack = new Stack<Node>();
        String myPrint = "";
        while(temp != null || stack.size() > 0){
            while(temp != null){
            stack.push(temp);
            temp = temp.left;
        }
        temp = stack.pop();
        myPrint += temp.elem + ", ";
        temp = temp.right;
        }
        //myPrint += "]";
        return myPrint;
    }
    
    /**
     * Instructor Note: **DO NOT MODIFY**
     */
    public String toString(){ 
        if(root == null){
            return "[]";
        }
        
        return root.toString(); 
    }

}