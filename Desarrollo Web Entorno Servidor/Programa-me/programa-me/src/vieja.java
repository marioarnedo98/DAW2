import java.util.Scanner;
import java.lang.Object;
import java.util.ArrayList;
import java.util.*;

public class vieja {

	public static void separarNietos(String nombreaBuscar, int numeros, String nietos) {
		String partes[] = nietos.split(" ");// separamos por espacios
		int contador=0;
		int j = partes.length - 1;// obtenemos el ultimo valor (partes[j])
		if (partes.length > 2) {
			for (int i = 0; i < j; i++) {
				if (partes[i].equals(partes[j])) {
					contador++;
				}
			}
				if (nombreaBuscar.equals(partes[j]) && contador==0) {
					System.out.println("VERDADERA");
				} else {
					System.out.println("FALSA");
				}
			} else {
				System.out.println("FALSA");
		}
	}

	public static void main(String[] args) {
		Scanner entrada = new java.util.Scanner(System.in);
		int numCasos;
		numCasos = entrada.nextInt();
		for (int i = 0; i < numCasos; i++) {
			String nombreaBuscar_ = entrada.next();
			int numeros = entrada.nextInt();
			String nietos = entrada.nextLine();
			separarNietos(nombreaBuscar_, numeros, nietos);
		}

	}
}
