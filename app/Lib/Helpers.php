<?php


function get_smallest_leaf($tree)
{
    $leaves = has_children($tree);
    return is_array($leaves)? min(get_values($leaves)) : $leaves;
}

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