/**
 * CS 480 - Assignment 4 - Fall 2023
 * Programmer: Shakyla Smith
 * Section: CS 480 - 001
 * Due Date: 11/07/2023 
 * 
 * @brief A program that simulates the readers-writers problem.
 *
 * This program simulates the readers-writers problem using threads and semaphores. 
 * It creates one reader thread and a specified number of writer threads. 
 * 
 * The reader thread continuously reads the shared string and prints it.
 *  
 * The writer threads continuously removes 1 character from the end of the string.
 *
 * usage: ./z1612149_project4_p2 num_readers num_writers
 */
#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>
#include <semaphore.h>
#include <string.h>
#include <unistd.h>

#define MAX_STRING_LEN 50

char shared_string[MAX_STRING_LEN] = "All work and no play makes Jack a dull boy.";
int stop_flag = 0;

//This mutex is used to protect the stop_flag from race conditions
pthread_mutex_t stop_flag_mutex = PTHREAD_MUTEX_INITIALIZER;

sem_t write_complete, read_complete;

/**
 * @function writer
 * @brief A function that simulates a writer in the readers-writers problem.
 *
 * This function is to be used as a thread function. It enters a loop
 * where it performs the following steps in each iteration:
 * - Checks if the stop_flag is set. If it is, it breaks the loop.
 * - Waits for the read_complete semaphore to ensure no reader is currently reading the shared string.
 * - Checks if the shared string is empty. If it is, sets the stop_flag, posts the read_complete semaphore, and exits the thread.
 * - If the shared string is not empty, removes the last character from the string.
 * - Posts the write_complete semaphore to indicate that it has finished writing.
 * - Sleeps for 1 second before starting the next iteration.
 *
 * @param param A pointer to the ID of the thread. The ID is used in the printed messages.
 */
void *writer(void *param)
{
    while (!stop_flag) {
        //Check if stop_flag is set
        pthread_mutex_lock(&stop_flag_mutex);
        if(stop_flag){
            pthread_mutex_unlock(&stop_flag_mutex);
            break;
        }
        pthread_mutex_unlock(&stop_flag_mutex);

        //Wait for readers to finish
        sem_wait(&read_complete);

        //Set stop_flag if string is empty
        pthread_mutex_lock(&stop_flag_mutex);
        if (strlen(shared_string) == 0) {
            stop_flag = 1;
            pthread_mutex_unlock(&stop_flag_mutex);
            //Notify readers that writing change is done
            sem_post(&read_complete);
            pthread_exit(NULL);
        }
        pthread_mutex_unlock(&stop_flag_mutex);

        //Write to shared string
        if(shared_string[0] != '\0'){
            shared_string[strlen(shared_string)-1] = '\0';
        }
        
        //Notify readers that writing change is done
        sem_post(&write_complete);       
  
        sleep(1);
    }    
    pthread_exit(NULL);
}

/**
 * @function reader
 * @brief A function that simulates a reader in the readers-writers problem.
 *
 * This function is to be used as a thread function. It enters an infinite loop
 * where it performs the following steps in each iteration:
 * - Checks if the stop_flag is set. If it is, breaks the loop.
 * - Waits for the write_complete semaphore to ensure no writer is currently writing to the shared string.
 * - If the shared string is not empty, print the string.
 * - Post read_complete semaphore to indicate that it has finished reading.
 * - Sleeps for 1 second before starting next iteration.
 *
 * @param param A pointer to the ID of the thread. The ID is used in the printing of thread id.
 */
void *reader(void *param)
{
    while (1) {
        //Check if stop_flag is set
        pthread_mutex_lock(&stop_flag_mutex);
        if (stop_flag) {
            pthread_mutex_unlock(&stop_flag_mutex);
            break;
        }
        pthread_mutex_unlock(&stop_flag_mutex);

        sem_wait(&write_complete);
        
        //check shared string length before printing
        if (shared_string [0] != '\0') {
            printf("%s\n", shared_string);
        }

        //Notify writers that reading is done
        sem_post(&read_complete);
        sleep(1);
    }
    pthread_exit(NULL);
}

void *reader(void *param);
void *writer(void *param);


/**
 * @function main
 * @brief The main entry point for program.
 *
 * This function performs the following:
 * - Initializes the write_complete and read_complete semaphores.
 * - Creates one reader thread and the specified number of writer threads. Each thread is given a ID.
 * - Waits for all threads to finish using pthread_join.
 * - Destroys the semaphores and exits the program.
 *
 * @param argc The number of command line arguments.
 * @param argv An array of command line arguments. argv[2] is the number of writer threads.
 */
int main(int argc, char *argv[])
{
    if (argc != 3) {
        fprintf(stderr, "Usage: %s 1 reader and num writer threads\n", argv[0]);
        exit(1);
    }

    //set initial attributes
    int num_readers = 1;
    int num_writers = atoi(argv[2]);

    pthread_t threads[num_readers + num_writers];
    int thread_ids[num_readers + num_writers];

    //Initialize semaphores
    sem_init(&write_complete, 0, 0);
    sem_init(&read_complete, 0, 1);

    //Create readers thread
    thread_ids[0] = 1;
    pthread_create(&threads[0], NULL, reader, &thread_ids[0]);

    //Create writers threads
    for (int i = 0; i < num_writers; i++) {
        thread_ids[num_readers + i] = i + 1;
        pthread_create(&threads[num_readers + i], NULL, writer, &thread_ids[num_readers + i]);
    }

    //Wait for all threads to finish
    for (int i = 0; i < num_readers + num_writers; i++) {
        pthread_join(threads[i], NULL);
    }

    //Cleanup and exit
    sem_destroy(&write_complete);
    sem_destroy(&read_complete);
    pthread_exit(NULL);
}
    
