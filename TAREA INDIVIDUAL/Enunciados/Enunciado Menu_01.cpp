//PRINCIPAL.CPP
/* ENUNCIADO: Realizar un programa que permita visualizar un menu
				MENU 1
			=============
			1. FACTORIAL
			2. PRIMO
			3. SERIE MATEMATICA
			S. SALIR

	El usuario visualiza siempre el menu hasta que digite S.
	* VALIDAR EL INGRESO DE DATOS
	* EL NUMERO INGRESADO POR TECLADO ( 0 <= num  <= 10)
	* CALCULA CUANTOS TERMINOS?
	  SERIE MATEMATICA 1 + 4/2 - 9/6 + 16/24 - ..... cont^2/cont!

  */

# include "espe.h"

#define MIN 0
#define MAX 10
#define MAXX 100


//Prototipo de funciones


void main(){
//VARIABLES LOCALES
int numero;


while(1){

  // DESPLIEGA UN MENU EN PANTALLA
		puts("MENU");
		puts("=============");
		puts("1. FACTORIAL");
		puts("2. PRIMO");
		puts("3. SERIE MATEMATICA");
		puts("S. SALIR\n");
		cin >> op;

     
	// INGRESAR EL NUMERO EN LA CAJA DE TEXTO DEL BROWSER
       cin >> numero;

	switch( op ){        
		case '1':	// CLACULA EL FACTORIAL
					 cout << endl << "FACTORIAL DE " << num << " ES:\t";

					break;

		case '2':     
				     //AVERIGUA SI NUM ES PRIMO
					
					break;

		case '3': 
					//CALCULAR LA SERIE MATEMATICA (Cuentos terminos indique el numero)
					//       1 + 4/2 - 9/6 + 16/24 - ..... cont^2/cont!

					break;

			
	}//SWITCH



}//Fin Main

//*************************

