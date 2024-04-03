<?php

// Class Book
class Book {
    private $title;
    private $author;
    private $year;
    private $isBorrowed;

    // Constructor
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->isBorrowed = false;
    }

    // Getter methods
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getYear() {
        return $this->year;
    }

    public function isBorrowed() {
        return $this->isBorrowed;
    }

    // Method to borrow the book
    public function borrowBook() {
        if (!$this->isBorrowed) {
            $this->isBorrowed = true;
            echo "The book '{$this->title}' has been borrowed.\n";
        } else {
            echo "Sorry, the book '{$this->title}' is already borrowed.\n";
        }
    }

    // Method to return the book
    public function returnBook() {
        if ($this->isBorrowed) {
            $this->isBorrowed = false;
            echo "The book '{$this->title}' has been returned.\n";
        } else {
            echo "Error! The book '{$this->title}' is not borrowed.\n";
        }
    }
}

// Class Library
class Library {
    private static $books = [];

    // Method to add a new book to the library
    public static function addBook(Book $book) {
        self::$books[] = $book;
        echo "The book '{$book->getTitle()}' has been added to the library.\n";
    }

    // Method to print available books
    public static function printAvailableBooks() {
        echo "Available Books:\n";
        foreach (self::$books as $book) {
            if (!$book->isBorrowed()) {
                echo "- '{$book->getTitle()}' by {$book->getAuthor()} ({$book->getYear()})\n";
            }
        }
    }
}

// Creating some books
$book1 = new Book("Dhafan to Jannah", "Islam Haqqoh", 1925);
$book2 = new Book("Pray for your Jannah", "Qur'an wa Sunnah", 1960);

// Adding books to the library
Library::addBook($book1);
Library::addBook($book2);

// Borrowing a book
$book1->borrowBook();
$book2->borrowBook();

// Trying to borrow a book already borrowed
$book1->borrowBook();

// Returning a book
$book2->returnBook();

// Printing available books
Library::printAvailableBooks();

?>
