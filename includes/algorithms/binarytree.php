<?php

// https://github.com/Basemera/Data-Structures/tree/master/binary_search
// https://www.sitepoint.com/data-structures-2/
/**
 * Class for creating the binary tree
 */
namespace Algorithms {

  defined( 'ABSPATH' ) || exit;

  require_once plugin_dir_path(__FILE__) . '../comparable.php';

    use IronPawsLLC\Comparable;
    use IronPawsLLC\Race_Details;

class BinaryTree { 

      private $root = null;

      public function __construct() {
          $this->root = null;
      }

      /**
       * Method to check if the tree is empty
       */
      public function isEmpty() {
          return $this->root === null;
      }

      /**
       * Inserts a node into the tree, calling the Comparable->compareTo operator
       *  If compareTo returns < 0,the node will be added on the left
       *  If compareTo returns 0, the visited node will be retuned
       *  If compareTo returns > 0, the node will be added on the right
       * To have duplicates, don't return 0 on compare
       * @param-> data: The data to store. It must implement Comparable.
       * @return-> BinaryNode: The new node in the tree, or the exisiting node
       */
      public function insertOrFetch(Comparable $data) {
          $node = new BinaryNode($data);
          if ($this->isEmpty()) { // this is the root node
              $this->root = $node;
              return $node;
          } else {
              return $this->insertOrFetchNode($node, $this->root);
          }
      }

      /**
       * Method to recursively add nodes to the binary tree
       * @return: The new node, or the existing current node.
       * TODO: Just return the new or found node instead of breaking out of the 
       * while loop.
       */
      private function insertOrFetchNode($node, $current) {
          $added = false;
          while($added === false) {
              $result = $node->data->compareTo($current->data);

              if ($result < 0) {
                  if($current->left === null) {
                      $current->addChildren($node, $current->right);
                      $added = $node;
                      break;
                  } else {
                      $current = $current->left;
                      return $this->insertOrFetchNode($node, $current);
                  }
                  
              }
              elseif ($result > 0) {
                  if($current->right === null) {
                      $current->addChildren($current->left, $node);
                      $added = $node;
                      break;
                  } else {
                      $current = $current->right;
                      return $this->insertOrFetchNode($node, $current);
                      }
              } else {
                  // case 1: found the node.
                  $added = $current;
                  break;
              }
          }
          return $added;   
      }

      /**
       * Method to retrieve a node from the binary tree
       */
      public function fetch($node) {
          if ($this->isEmpty()) { // this is the root node
              return false;
          }

          if ($node->data === $this->root->data) {             
            return $this->root;
          } else {
            $current = $this->root;
            return $this->retrieveNode($node, $current);        
          }
      }

      /**
       * Method to recursively add nodes to a binary tree
       * @return: false on failure, node if successful
       */
      private function retrieveNode($node, $current) {
          $exists = false;
          while($exists === false) {
              if ($node->data > $current->data) {
                if ($current->left === null) {
                  break;
                  }
                  elseif($node->data == $current->left->data) {
                    $exists = $current->left;
                    break;
                  }
                  else {
                      $current = $current->left;
                      return $this->retrieveNode($node, $current);
                  }
                  
              }
              elseif ($node->data < $current->data) {
                if ($current->right === null) {
                  break;
                }
                elseif($node->data == $current->right->data) {
                  $exists = $current->right;
                  break;
                } else {
                  $current = $current->right;
                  return $this->retrieveNode($node, $current);
                }
              }
          }
          return $exists;
      }

      private function findParent($child, $current) {
          $parent = false;
          while ($parent === false) {
            if ($child->data > $current->data) {
              if ($child->data === $current->left->data) {
                $parent = $current;
                break;
              } else {
                return $this->findParent($child, $current->left);
                break;
              }
            }
            elseif ($child->data < $current->data) {
              if ($child->data === $current->right->data) {
                $parent = $current;
                break;
              } else {
                return $this->findParent($child, $current->right);
                break;
              }
            } else {
              break;
            }
          }
          return $parent;
      }
    
      /**
       * Method to remove an element from the binary tree
       */
      public function removeElement($elem) {
          if ($this->isEmpty()) {
              return false;
          }

          $node = $this->retrieve($elem);
          
          if (!$node) {
          return false;
          }

          //Case one remove the root
          if ($elem->data === $this->root->data) {
          // find the largest value in the left sub tree
          $current = $this->root->left;
          while($current->right != null) {
              $current = $current->right;
              continue;
          }
          // set this node to be the root
          $current->left = $this->root->left;
          $current->right = $this->root->right;

          $parent = $this->findParent($current, $this->root);
          $parent->right = $current->left;

          $this->root = $current;
          return true;
          }

          // case two we are removing a leaf node
          if ($node->left === null and $node->right === null) {
          $parent = $this->findParent($node, $this->root);
          if ($parent->left->data && $node->data === $parent->left->data) {
              $parent->left = null;
              return true;
          }
          elseif ($parent->right->data && $node->data === $parent->right->data) {
              $parent->right = null;
              return true;

          }
          return $parent;
          }
      }

      // @return-> true = success, false == failure
      public function traverse(): bool {
        if ($this->isEmpty()) {
          return false;
        }

        // dump the tree rooted at "root"
        $this->root->dump();

        return true;
      }

      // @return-> true = success, false = failure
      public function walk($arg): bool {
        assert(!is_null($arg->callback));
        if ($this->isEmpty()) {
          return false;
        }

        $this->root->walk($arg);

        return true;
      }
  }
}
?>
