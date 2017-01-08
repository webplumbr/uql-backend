<?php
//Helper functions

/**
 * Find the smallest value of the leaf in a binary tree
 *
 * @param stdClass $tree
 * @return integer
 */
function get_smallest_leaf($tree)
{
    $leaves = has_children($tree);
    return is_array($leaves)? min(get_values($leaves)) : $leaves;
}

/**
 * Accepts a multi-dimensional array and converts it to a flat array with values
 * key=value relationship is NOT maintained
 *
 * @param multi-dimensional array $arr
 * @return array
 */
function get_values($arr)
{
    $values = [];
    foreach ($arr as $item) {
        if (is_array($item)) {
            $values = array_merge($values, get_values($item));
        } else {
            $values[] = $item;
        }
    }
    return $values;
}

/**
 * Accepts a binary tree as input and returns the identified leaf|leaves
 *
 * @param stdClass $node
 * @return array|integer
 *
 */
function has_children($node)
{
    if (isset($node->left) && isset($node->right)) {
        $leaves = [];
        $leaves[] = has_children($node->left);
        $leaves[] = has_children($node->right);
        return $leaves;
    } else if (isset($node->left)) {
        return has_children($node->left);
    } else if (isset($node->right)) {
        return has_children($node->right);
    } else {
        return $node->root;
    }
}