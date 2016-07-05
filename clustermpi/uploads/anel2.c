#include <stdio.h>
#include <stdlib.h>
#include <mpi.h>

int size, rank, msg, tag, voltas;
 
int main(int argc, char *argv[]){
   MPI_Status stat;
   MPI_Init(&argc,&argv);
   MPI_Comm_size(MPI_COMM_WORLD,&size);
   MPI_Comm_rank(MPI_COMM_WORLD,&rank);
	
	//Passar o número de voltas no parâmentro, caso contrário o numero de voltas será 1
	if (argc>1){
		voltas = atoi(argv[1]);
	}else{
		voltas = 1;
	}

	int controleVoltas = 1;	
	int proximo = rank + 1;
	int anterior = rank - 1;
	double startTime, voltaAnterior;

	//Controla que é o proximo e o anterior
	if (rank==size-1){
		proximo = 0;
	}
	if (rank==0){
		anterior = size-1;
	}

	//Se for o 0 inicia o envio
	if(rank==0){
	   	msg = 42; tag = 0;
	
		voltaAnterior = startTime = MPI_Wtime();

		MPI_Send(&msg, 1, MPI_INT, proximo, tag, MPI_COMM_WORLD);
		printf("Processo %d enviou %d para %d.\n", rank, msg, proximo);		
	}
	
	//Roda o valor enquanto o número de voltas não for ultrapassado
	while (controleVoltas<=voltas){
		controleVoltas++;

		//Aguarda o recebimento do proc. anterior
		MPI_Recv(&msg, 1, MPI_INT, anterior, tag, MPI_COMM_WORLD, &stat);
		printf("Processo %d recebeu %d de %d.\n", rank, msg, anterior);
		
		//Se voltar para o 0 marca o tempo da volta
		if (rank==0){
			double tempoVolta = MPI_Wtime();
			printf("Tempo da volta %d: %f segundos\n",controleVoltas-1,tempoVolta-voltaAnterior);
			voltaAnterior = tempoVolta;
		}

		//Se voltar para o 0 e não tiver mais voltas, encerra o loop
		if (rank==0 && controleVoltas>voltas)
			continue;

		//Envia o valor para o próximo proc.
		MPI_Send(&msg, 1, MPI_INT, proximo, tag, MPI_COMM_WORLD);
		printf("Processo %d enviou %d para %d.\n", rank, msg, proximo);	
	}	
	
	//No fim o 0 marca o tempo total
	if (rank==0){
		double tempo = MPI_Wtime();
		printf("Tempo total: %f segundos\n",tempo-startTime);
	}
	
   MPI_Finalize();
}
