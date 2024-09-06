<?php
// Set strict types
declare(strict_types=1);

class Lied {

    private int $ID;
    private string $naam;
    private string $duration;
    private int $BPM;
    private string $noot;

    /**
     * @param int $ID
     * @param string $naam
     * @param string $duration
     * @param int $BPM
     * @param string $noot
     */
    public function __construct(int $ID, string $naam, string $duration, int $BPM, string $noot)
    {
        $this->ID = $ID;
        $this->naam = $naam;
        $this->duration = $duration;
        $this->BPM = $BPM;
        $this->noot = $noot;
    }

    public function getID(): int
    {
        return $this->ID;
    }

    public function setID(int $ID): void
    {
        $this->ID = $ID;
    }

    public function getNaam(): string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): void
    {
        $this->naam = $naam;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
    }

    public function getBPM(): int
    {
        return $this->BPM;
    }

    public function setBPM(int $BPM): void
    {
        $this->BPM = $BPM;
    }

    public function getNoot(): string
    {
        return $this->noot;
    }

    public function setNoot(string $noot): void
    {
        $this->noot = $noot;
    }


    /**
     * Haalt alle personen op uit de database.
     *
     * @param PDO $db De PDO-databaseverbinding.
     * @return Lied[] Een array van Persoon-objecten.
     */
    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM lied");

        // Array om liedjes op te slaan
        $liedjes = [];

        // Itereren over de resultaten en liedjes toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lied = new Lied(
                $row['ID'],
                $row['naam'],
                $row['duration'],
                $row['BPM'],
                $row['noot'],
            );
            $liedjes[] = $lied;
        }

        // Retourneer array met personen
        return $liedjes;
    }}