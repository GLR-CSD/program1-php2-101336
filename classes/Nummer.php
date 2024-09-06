<?php
// Set strict types
declare(strict_types=1);

class Nummer
{

    private ?int $ID;
    private string $AlbumID;
    private string $Titel;
    private ?string $Duur;
    private ?string $URL;

    /**
     * @param int|null $ID
     * @param string|null $URL
     * @param string|null $Duur
     * @param string $Titel
     * @param string $AlbumID
     */
    public function __construct(?int $ID, ?string $URL, ?string $Duur, string $Titel, string $AlbumID)
    {
        $this->ID = $ID;
        $this->URL = $URL;
        $this->Duur = $Duur;
        $this->Titel = $Titel;
        $this->AlbumID = $AlbumID;
    }

    public function getID(): ?int
    {
        return $this->ID;
    }

    public function setID(?int $ID): void
    {
        $this->ID = $ID;
    }

    public function getURL(): ?string
    {
        return $this->URL;
    }

    public function setURL(?string $URL): void
    {
        $this->URL = $URL;
    }

    public function getDuur(): ?string
    {
        return $this->Duur;
    }

    public function setDuur(?string $Duur): void
    {
        $this->Duur = $Duur;
    }

    public function getTitel(): string
    {
        return $this->Titel;
    }

    public function setTitel(string $Titel): void
    {
        $this->Titel = $Titel;
    }

    public function getAlbumID(): string
    {
        return $this->AlbumID;
    }

    public function setAlbumID(string $AlbumID): void
    {
        $this->AlbumID = $AlbumID;
    }


    /**
     * Haalt alle personen op uit de database.
     *
     * @param PDO $db De PDO-databaseverbinding.
     * @return Nummer[] Een array van Nummer-objecten.
     */
    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM Nummer");

        // Array om nummers op te slaan
        $nummers = [];

        // Itereren over de resultaten en personen toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nummer = new Nummer(
                $row['ID'],
                $row['AlbumID'],
                $row['Titel'],
                $row['Duur'],
                $row['URL'],
            );
            $nummers[] = $nummer;
        }

        // Retourneer array met nummers
        return $nummers;
    }
}


