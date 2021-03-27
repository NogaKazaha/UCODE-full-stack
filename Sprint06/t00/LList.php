<?php
    include "LLItem.php";
    class NewIterator implements Iterator {
        private $arr = [];
        public function __construct($array) {
            if (is_array($array)) {
                $this->arr = $array;
            }
        }
        public function current() {
            $arr = current($this->arr);
            return $arr;
        }
        public function next() {
            $arr = next($this->arr);
            return $arr;
        }
        public function key() {
            $arr = key($this->arr);
            return $arr;
        }
        public function valid() {
            $key = key($this->arr);
            $arr = ($key !== NULL && $key !== FALSE);
            return $arr;
        }
        public function rewind() {
            reset($this->arr);
        }
    }
    class LList implements IteratorAggregate {
        public $head;
        public function __construct() {
            $this->head = null;
        }
        public function getFirst() {
            if($this->head != null) {
                return $this->head->data;
            } 
            else {
                echo "First item does not exist\n";
            }
        }
        public function getLast() {
            if($this->head != null) {
                $new_item = new LLItem();
                $new_item = $this->head;
                while($new_item->next != null) {
                    $new_item = $new_item->next;
                }
                return $new_item->data;
            }
        }
        public function add($value) {
            $new_node = new LLItem();
            $new_node->data = $value;
            $new_node->next = null;
            if($this->head == null) {   
                $this->head = $new_node;
            } 
            else {
                $new_item = new LLItem();
                $new_item = $this->head;
                while($new_item->next != null) {
                    $new_item = $new_item->next;
                }
                $new_item->next = $new_node; 
            }
        }
        public function addArr($array) {
            for($i = 0; $i < count($array); ++$i) {
                $this->add($array[$i]);
            }
        }
        public function remove($value) {
            $curr = new LLItem();
            $prev = new LLItem();
            $curr = $this->head;
            $prev = $this->head;
            while($curr->data != $value) {
                if($curr->next == null) {
                    return null;
                } else {
                    $prev = $curr;
                    $curr = $curr->next;
                }
            }
            if($curr == $prev) {
                $this->head = $curr->next;
            }
            $prev->next = $curr->next;
        }
        public function removeAll($value) {
            $new_item = new LLItem();
            $new_item = $this->head;
            while($new_item != null) {
                if($new_item->data == $value) {
                    $this->remove($value);
                }
                $new_item = $new_item->next;
            }
        }
        public function contains($value) {
            $new_item = new LLItem();
            $new_item = $this->head;
            $contains = false;
            while($new_item != null) {
                if($new_item->data == $value) {
                    $contains = true;
                    return $contains;
                }
                $new_item = $new_item->next;
            }
            return $contains;
        }
        public function clear() {
            $new_item = new LLItem();
            $new_item = $this->head;
            while($new_item != null) {
                $this->remove($new_item->data);
                $new_item = $new_item->next;
            }
        }
        public function count() {
            $new_item = new LLItem();
            $new_item = $this->head;
            $count = 0;
            while($new_item != null) {
                $count++;
                $new_item = $new_item->next;
            }
            return $count;
        }
        public function toString() {
            $new_item = new LLItem();
            $new_item = $this->head;
            $str = "";
            if($new_item != null) {
                while($new_item != null) {
                    if($new_item->next == null) {
                        $str = $str.$new_item->data;
                    } else {
                        $str = $str.$new_item->data.", ";
                    }
                    $new_item = $new_item->next;
                }
            } 
            else {
                return null;
            }
            return $str;
        }
        public function getIterator() {
            $new_item = new LLItem();
            $new_item = $this->head;
            $new_itemArr = [];
            $i = 0;
            while($new_item != null) {
                $new_itemArr[$i] = $new_item->data;
                $i++;
                $new_item = $new_item->next;
            }
            $itName = new NewIterator($new_itemArr);
            return $itName;
        }
    }
    $list= new LList();
    $list->addArr([100, 1, 2, 3, 100, 4, 5, 100]);
    $list->removeAll(100);
    $list->add(10);
    echo $list->contains(10) . "\n"; // 1
    echo $list->getFirst()."\n"; // 1
    echo $list->getLast()."\n"; // 10
    echo $list->count()."\n"; // 6
    echo $list->toString() . "\n"; // 1, 2, 3, 4, 5, 10
    $sum= 0;
    $iter = $list->getIterator();
    foreach($iter as $v)
        $sum += $v;
    echo"$sum\n"; // 25
    $list->clear();
    echo $list->toString() . "\n";
?>