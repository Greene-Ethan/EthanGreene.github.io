CC=gcc
CFLAGS=-c -Wall -g 

all: hw5

hw5: hw5.c mem.o
	$(CC) hw5.c mem.o -o hw5

hw5.o: hw5.c mem.h
	$(CC) $(CFLAGS) hw5.c

mem.o: mem.c mem.h
	$(CC) $(CFLAGS) mem.c

clean:
	/bin/rm -f hw5 *.o *.gz

run:
	./hw5 100 200 300 400

tarball:
	tar -cvzf hw5.tar.gz *

