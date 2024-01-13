# Standard compiler variables 

CC = g++
CCFLAGS = -Wall -g

all: z1612149_project4 z1612149_project4_p2

# Rules start here
z1612149_project4: z1612149_project4.o
	$(CC) $(CCFLAGS) -o z1612149_project4 z1612149_project4.o -lpthread
    
z1612149_project4.o: z1612149_project4.c
	$(CC) $(CCFLAGS) -c z1612149_project4.c
    
z1612149_project4_p2: z1612149_project4_p2.o
	$(CC) $(CCFLAGS) -o z1612149_project4_p2 z1612149_project4_p2.o -lpthread

z1612149_project4_p2.o: z1612149_project4_p2.c
	$(CC) $(CCFLAGS) -c z1612149_project4_p2.c

clean:
	-rm *.o
	-rm z1612149_project4 z1612149_project4_p2

