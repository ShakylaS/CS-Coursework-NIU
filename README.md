ENTERPRISE APPLICATION ENVIRONMENTS COURSEOWRK
  - COBOL INTRO - COBOL program with embedded JCL statements. The JCL statements specify the libraries where the system can find the necessary programs to compile and run the COBOL program.
      The COBOL program itself, SALESRPT, reads input data records and writes them to standard output
  
  - COBOL REPORTS - JCL script used to compile and run a COBOL program on an IBM z/OS mainframe system. The script specifies the COBOL compiler and the necessary libraries to use for the compilation.
      The COBOL program, SALESRPT, creates two reports based on information contained in an input file.
  
  -  ASSEMBLER REPORTS - Job log from IBM z/OS mainframe system. The log contains information about the job's execution, including the user ID associated with the job, the steps executed, the resources used, and the job's return code.

  -  COBOL TABLES AND SUBPROGRAMS -  A COBOL program that processes a sales transaction file and generates two reports. The program reads from an input file, processes each record, and writes output to two report files.
       The program interacts with other programs or subroutines, written in Assembler / COBOL, to perform additional calculations or processing.

OPERATING SYSTEMS COURSEWORK
  - MULTITHREADING READER - WRITERS PROBLEM - A multithreaded program that simulates the readers-writers problem. This program creates a specified number of reader and writer threads.
      It uses a shared string as the shared resource. The program uses semaphores for synchronization to ensure that:
        Multiple readers can read the string simultaneously.
        Only one writer can write to the string at a time.
        A writer has exclusive access to the string when it's writing.

DATABASES COURSEWORK
- The project involves designing a pet store shopping website using PHP, HTML, and CSS, and creating a Relational Database Management System (RDBMS) using SQL. The PHP code, interacts with the SQL database to retrieve the items for sale, add 
  items to the user's cart, process the checkout, and update the database.

  SECURITY BASICS
  - CAMELLIA ENCRYPTION - DECRYPTION - This C++ program measures the performance of the Camellia encryption algorithm. It prepares a key and a plaintext message, then encrypts the message 1000 times, recording the time taken for each 
      encryption. After all encryptions, it calculates the average time taken per encryption. The result is then printed out in nanoseconds.
  - AES ENCRYPTION - DECRYPTION - This C++ program measures the performance of the AES encryption and decryption algorithm. It first encrypts a plaintext message multiple times, recording the time taken for each encryption, and then 
      calculates and prints the average encryption time. The process is repeated for decryption. Finally, it decrypts the ciphertext one last time and prints the resulting plaintext to verify correctness.
