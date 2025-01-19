<?php

namespace Domain\Entities;

class Course
{
    private $id;
    private $name;
    private $description;
    private $status;
    private $image;
    private $created_at;
    private $updated_at;

    public function __construct($id, $name, $description, $status, $image, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->status = $status;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
