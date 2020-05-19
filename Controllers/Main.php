<?php

class Main extends Controller
{
    public function index()
    {
    }

    public function getSections()
    {
        $find = R::findAll('sections', 'ORDER BY title, updated ASC');
        $sections = [];

        foreach ($find as $section) {
            $properties = $section->getProperties();
            $paramsSect = [];
            foreach ($properties as $key => $property) {
                $paramsSect[$key] = $property;
            }
            $id = $paramsSect['id'];
            $parent_id = $paramsSect['parent_id'];
            if (is_null($parent_id)) {
                $parent_id = 0;
            }
            $sections[$parent_id][$id] = $paramsSect;
        }

        if (empty($sections[0])) {
            $this->set('tree', []);
        }
        else {
            $this->generateElemTree($sections[0], $sections);
            $this->set('tree', $sections[0]);
        }
    }

    function generateElemTree(&$treeElem, $parents_arr) {
        foreach($treeElem as $key=>$item) {
            if(!isset($item['children'])) {
                $treeElem[$key]['children'] = array();
            }
            if(array_key_exists($key, $parents_arr)) {
                $treeElem[$key]['children'] = $parents_arr[$key];
                $this->generateElemTree($treeElem[$key]['children'], $parents_arr);
            }
        }
    }

    public function getElements()
    {
        $parentId = $this->dataForm['parent_id'];
        $find = R::findAll('elements', "WHERE parent_id = $parentId ORDER BY title, updated ASC");
        $elements = [];

        foreach ($find as $element) {
            $properties = $element->getProperties();
            $paramsSect = [];
            foreach ($properties as $key => $property) {
                $paramsSect[$key] = $property;
            }
            $id = $paramsSect['id'];
            $title = $paramsSect['title'];
            $description = $paramsSect['description'];
            $type = $paramsSect['type'];

            $elements[] = [
                'id' => $id,
                'type' => $type,
                'description' => $description,
                'title' => $title
            ];
        }

        $this->set('elements', $elements);
    }
}