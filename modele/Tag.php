<?php



class Tag
{
    public ?int $id;
    public ?string $name;
    public ?string $description;
    private $pdo;
    public ?float $note;

    public function __construct()
    {
        $this->pdo = getpdo();
    }
    public function all()
    {
        $sql = "select id, name, description, note from tag";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function delete(int $id)
    {
        $sql = 'delete from tag where id= :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function insert()
    {
        $sql = 'insert into tag (name, description, note)';
        $sql = $sql . ' values (:name, :description,:note)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':note', $this->note);

        $stmt->execute();
        $this->id = $this->pdo->lastinsertId();
        $this->select($this->id);
    }
    public function update()
    {
        $sql = 'update tag set name=:name, description=:description, note=:note';
        $sql = $sql . ' where id= :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':note', $this->note);
        $stmt->execute();

        $this->select($this->id);
    }

    public function select(int $id)
    {
        $sql = "select id, name, description, note from tag where id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->note = $data['note'];
    }
}
