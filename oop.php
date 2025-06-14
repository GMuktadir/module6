<?php
//Golam Muktadir
class Book{
    private $title,$availableCopies;
    public function __construct($title,$availableCopies)
    {
        $this->title=$title;
        $this->availableCopies=$availableCopies;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getAvailableCopies(){
        return $this->availableCopies;
    }
    public function borrowBook($numofbook){
        if($this->availableCopies>0){
            return $this->availableCopies-=$numofbook;
        }
    }
    public function returnBook($numofbook){
        return $this->availableCopies+=$numofbook;
    }
}

class Member{
    private $name;
    public function __construct($name)
    {
        $this->name=$name;
    }
    public function getName() {
        return $this->name;
    }
    public function borrowBook(Book $book,$numofbook){
        if($book->borrowBook($numofbook)){
            echo $numofbook.' copy(s) of '.$book->getTitle().' successfully [borrowed] by '.$this->name.'<br>';
        }
    } 
    public function returnBook(Book $book,$numofbook){
        if($book->returnBook($numofbook)){
            echo $numofbook.' copy(s) of '.$book->getTitle().' successfully [returned] by '.$this->name.'<br>';
        }
    }
} 
class Library{
    private $books=[];
    private $members=[];
    public function addBook(Book $book){
        $this->books[]=$book;
        echo $book->getAvailableCopies().' copies of '.$book->getTitle().' book added to the library<br>';
    }
    public function addMember(Member $member){
        $this->members[]=$member;
        echo $member->getName().' member added to the library<br>';
    }
    public function availabilityBooks(){
        echo "<br>Available Books in the Library<br>-----------------------------------------<br>";
        foreach($this->books as $book){
            echo 'Available Copies of \''.$book->getTitle().'\':'.$book->getAvailableCopies().'<br>';
            
        }
    }
}
//Instance of Book
echo "<h2>Simple Library System</h2><br>";
$book1=new Book("The Great Gatsby",5);
$book2=new Book("To Kill a Mockingbird",3);

//Instance of Member
$member1=new Member("John Doe");
$member2=new Member("Jane Smith");

//Instance of Library
$library=new Library();
//added books to library
$library->addBook($book1);
$library->addBook($book2);
echo"-------------------------------------------------------------><br>";
//added members to the library
$library->addMember($member1);
$library->addMember($member2);
echo"-------------------------------------------------------------><br>";
//Borrow Books
$member1->borrowBook($book1,1);
$member2->borrowBook($book2,1);
echo"-------------------------------------------------------------><br>";
//status of library stock of books
$library->availabilityBooks();
echo"-------------------------------------------------------------><br>";
// Return Books
$member1->returnBook($book1,5);
$member2->returnBook($book2,6);
echo"-------------------------------------------------------------><br>";
//status of library stock of books
$library->availabilityBooks();

?>