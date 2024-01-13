/**
 * CS 480 - Assignment 4 - Fall 2023
 * Programmer: Shakyla Smith
 * Section: CS 480 - 001
 * Due Date: 11/07/2023 
 * 
 * @brief A multithreaded program that simulates the readers-writers problem.
 *
 * This program creates a specified number of reader and writer threads.
 * It uses a shared string as the shared resource. Writers continuously remove
 * 1 character from the end of the string, and readers print the string.
 * The program uses semaphores for synchronization to ensure that:
 * - Multiple readers can read the string simultaneously.
 * - Only one writer can write to the string at a time.
 * - A writer has exclusive access to the string when it's writing.
 *
 * The program terminates when the string is empty.
 *
 * Usage: ./z1612149_project4 num_readers num_writers
 */
#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>
#include <semaphore.h>
#include <string.h>
#include <unistd.h>

#define MAX_STRING_LEN 50

char shared_string[MAX_STRING_LEN] = "All work and no play!";
int readcount = 0;

sem_t mutex, rw_sem;
/**
 * @function writer
 * @brief A function that simulates a writer in the readers-writers problem.
 *
 * This function is used as a thread function. It enters an infinite loop
 * where it performs the following steps:
 * - Checks if the shared string is empty. If it is, prints a message and exits the thread.
 * - Waits for the rw_sem semaphore. This is a synchronization rule that ensures exclusive
 *   access to the shared string.
 * - Prints a message indicating that it's writing.
 * - If the shared string is not empty, removes the last character from the string.
 * - Posts the rw_sem semaphore, allowing other threads to access the shared string.
 * - Sleeps for 1 second before starting the next iteration.
 *
 * @param param A pointer to the ID of the thread. The ID is used in the printed messages.
 */
void *writer(void *param)
{
    int id = *(int *)param;
    while (1) {
        //Check if string is empty
        if (strlen(shared_string) == 0) {
            printf("Writer %d: string is empty\n", id);
            pthread_exit(NULL);
        }

        sem_wait(&rw_sem);

        printf("Writer %d is writing.\n", id);
        if(strlen(shared_string) > 0){
            shared_string[strlen(shared_string)-1] = '\0';
        }

        sem_post(&rw_sem);
        sleep(1);
    }    
    pthread_exit(NULL);
}

/**
 * @function reader
 * @brief A function that simulates a reader in the readers-writers problem.
 *
 * This function is used as a thread function. It enters an infinite loop
 * where it performs the following steps:
 * - Checks if the shared string is empty. If it is, prints a message and exits the thread.
 * - Waits for the mutex semaphore. This is a synchronization rule that ensures that
 *   only one reader can modify the readcount variable at a time.
 * - Increments the readcount variable.
 * - If the readcount variable is 1, waits for the rw_sem semaphore. This is a synchronization
 *   rule that ensures exclusive access to the shared string.
 * - Prints a message indicating that it's reading.
 * - If the shared string is not empty, prints the string.
 * - Posts the mutex semaphore, allowing other threads to modify the readcount variable.
 * - Waits for the mutex semaphore. This is a synchronization rule that ensures that
 *   only one reader can modify the readcount variable at a time.
 * - Decrements the readcount variable.
 * - If the readcount variable is 0, posts the rw_sem semaphore, allowing other threads to
 *   access the shared string.
 * - Posts the mutex semaphore, allowing other threads to modify the readcount variable.
 * - Sleeps for 1 second before starting the next iteration.
 *
 * @param param A pointer to the ID of the thread. The ID is used in the printed messages.
 */
void *reader(void *param)
{
    int id = *(int *)param;

    while (1) {
        sem_wait(&mutex);
        readcount++;
        if (readcount == 1) {
            sem_wait(&rw_sem);
        }
        sem_post(&mutex);

        //Check if string is empty OR NULL
        if (shared_string[0] == '\0' ) {
            printf("Reader %d: string is empty\n", id);
            pthread_exit(NULL);
        }

        printf("Current readcount: %d\n", readcount);

        //check shared string length before printing
        if (shared_string [0] != '\0') {
            printf("Reader %d is reading: %s\n", id, shared_string);
        }

        sem_wait(&mutex);
        readcount--;
        if (readcount == 0) {
            sem_post(&rw_sem);
        }
        sem_post(&mutex);

        sleep(1);
    }
    pthread_exit(NULL);
}

void *reader(void *param);
void *writer(void *param);
/**
 * @function main
 * @brief The main entry point for the program.
 *
 * This main performs the following:
 * - Initializes the mutex and rw_sem semaphores.
 * - Creates the specified number of reader and writer threads. Each thread is given a unique ID.
 * - Waits for all threads to finish using pthread_join.
 * - Destroys the semaphores and exits the program.
 *
 * @param argc The number of command line arguments.
 * @param argv An array of command line arguments. argv[1] is the number of reader threads and argv[2] is the number of writer threads.
 */
int main(int argc, char *argv[])
{
    //Check for correct number of arguments
    if (argc != 3) {
        fprintf(stderr, "Usage: %s num reader threads num writer threads\n", argv[0]);
        exit(1);
    }

    //Set attributes
    int num_readers = atoi(argv[1]);
    int num_writers = atoi(argv[2]);

    pthread_t threads[num_readers + num_writers];
    int thread_ids[num_readers + num_writers];

    //Initialize semaphores
    sem_init(&mutex, 0, 1);
    sem_init(&rw_sem, 0, 1);

    // //Create readers threads
    for (int i = 0; i < num_readers; i++) {
        thread_ids[i] = i + 1;
        pthread_create(&threads[i], NULL, reader, &thread_ids[i]);
    }

    //Create writers threads
    for (int i = 0; i < num_writers; i++) {
        thread_ids[num_readers + i] = i + 1;
        pthread_create(&threads[num_readers + i], NULL, writer, &thread_ids[num_readers + i]);
    }

    // Wait for all threads to finish
    for (int i = 0; i < num_readers + num_writers; i++) {
        pthread_join(threads[i], NULL);
    }

    // Cleanup and exit
    sem_destroy(&mutex);
    sem_destroy(&rw_sem);
    pthread_exit(NULL);
}