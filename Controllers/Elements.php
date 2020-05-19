<?php
require_once 'Main.php';

class Elements extends Main
{
    private $table = 'elements';

    public function addElement()
    {
    }

    public function editElement()
    {
        $id = $this->dataForm['id'];
        $element = R::load($this->table, $id);
        $this->set('element', $element);
    }

    public function deleteElement()
    {
        $id = $this->dataForm['id'];
        $element = R::load($this->table, $id);
        R::trash($element);
    }

    public function moveElement()
    {
        $id = $this->dataForm['id'];
        $this->getSections();
        $this->set('id', $id);
    }

    public function saveElement()
    {
        $data = $this->dataForm;
        if (empty($data['id'])) {
            $element = R::dispense($this->table);
            $new = true;
        } else {
            $id = $data['id'];
            $element = R::load($this->table, $id);

            $new = false;
        }

        $element->title = $data['title'];
        $element->description = $data['description'];
        $element->type = $data['type'];
        $element->parent_id = $data['parent_id'];
        if (!$new) {
            $updated = new DateTime();
            $updated = $updated->format('Y.m.d H:i:s');
            $element->updated = $updated;
        }

        R::store($element);
    }

    public function moveElementAndSave()
    {
        $data = $this->dataForm;
        $id = $data['id'];
        $parentId = $data['parentId'];

        $element = R::load($this->table, $id);

        $element->parent_id = $parentId;
        R::store($element);
    }
}