import java.util.Scanner;
import java.lang.Object;
import java.util.ArrayList;
import java.util.*;

public class vieja {

	public static void separarNietos(String nombreaBuscar, String nietos) {
		nietos.toLowerCase();
		String partes[] = nietos.split(",");//separamos por comas
		int j=partes.length-1;//obtenemos el ultimo valor (partes[j])
		System.out.print(partes.length);
		if(nombreaBuscar.equals(partes[j])) {
			System.out.println("Coinciden");
		}
		else {
			System.out.println("No coincide");
		}
		
	}

	public static void main(String[] args) {
		 Scanner entrada = new java.util.Scanner( System.in ) ;
	        int numCasos ;
	        numCasos = entrada.nextInt ( ) ;
	        for ( int i = 0 ; i < numCasos ; i++) {
	        	String nombreaBuscar_=entrada.next();
	        	int numeros=entrada.nextInt();
	        	String nietos_scanner=entrada.next();
	        	separarNietos(nombreaBuscar_, nietos_scanner);
	        }
	       
	}
}
