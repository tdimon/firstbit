<?php
require_once 'Main.php';

class Sections extends Main
{
    private $table = 'sections';

    public function addSection()
    {
    }

    public function editSection()
    {
        $id = $this->dataForm['id'];
        $section = R::load($this->table, $id);
        $this->set('section', $section);
    }

    public function deleteSection()
    {
        $id = $this->dataForm['id'];

        $children = R::findAll($this->table, "WHERE parent_id = " . $id);
        R::trashAll($children);

        $childrenEl = R::findAll('elements', "WHERE parent_id = " . $id);
        R::trashAll($childrenEl);

        $section = R::load($this->table, $id);
        R::trash($section);
    }

    public function moveSection()
    {
        $id = $this->dataForm['id'];
        $level = $this->dataForm['level'];
        $this->getSections();
        $this->set('id', $id);
        $this->set('level', $level);
    }

    public function saveSection()
    {
        $data = $this->dataForm;
        if (empty($data['id'])) {
            $section = R::dispense($this->table);
            $new = true;
        }
        else
        {
            $id = $data['id'];
            $section = R::load($this->table, $id);

            $new = false;
        }

        $section->title = $data['title'];
        $section->description = $data['description'];
        if (!empty($data['parent_id'])) {
            $section->parent_id = $data['parent_id'];
        }

        if (!$new) {
            $updated = new DateTime();
            $updated = $updated->format('Y.m.d H:i:s');
            $section->updated = $updated;
        }

        R::store($section);
    }

    public function moveSectionAndSave()
    {
        $data = $this->dataForm;
        $currentId = $data['currentId'];
        $selectId = $data['selectId'];

        $section = R::load($this->table, $currentId);

        $section->parent_id = $selectId;
        R::store($section);
    }
}