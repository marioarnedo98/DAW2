import java.util.Scanner;
import java.lang.Object;
import java.util.ArrayList;
import java.util.*;

public class vieja {
	String nombreaBuscar;
	String nietos;

	public void separarNietos(String nombreaBuscar, String nietos) {
		this.nombreaBuscar = nombreaBuscar;
		this.nietos = nietos;
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

		vieja t1 = new vieja();
		t1.separarNietos("mario","juan,pepe,maria,mario");
	}
}
