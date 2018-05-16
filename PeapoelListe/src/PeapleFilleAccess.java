
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.Scanner;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ipd11
 */
public class PeapleFilleAccess {
    
    final static String FILE_NAME = ".trips";
    
    public static void savePersonListToFile(ArrayList<Person>list)throws  IOException{
        try (PrintWriter out = new PrintWriter(new BufferedWriter(new FileWriter(FILE_NAME, false)))) {
            for (Person p : list) {
                String line = String.format("%s;%d;%s", p.getName(), p.getAge(), p.getPostalcode());
                out.println(line);
        
        }
    
    }
}
public static  ArrayList<Person>loadPersonListFromFile(StringBuilder warnings) throws IOException{
   // throw new RuntimeException("implementde "); seeing rune ttim 
   
    ArrayList<Person> result = new ArrayList<>();
        File file = new File(FILE_NAME);
        if (!file.exists()) {
            return result;
        }
        try (Scanner fileInput = new Scanner(file)) {
            while (fileInput.hasNextLine()) {
                String line = fileInput.nextLine();
                String [] data = line.split(";");
                if (data.length != 3) {
                    warnings.append("\n* Invalid number of fields in line, skipping: " + line);
                    continue;
                }
                String name = data[0];
                String strAge = data[1];
                String postalCode = data[2];
                int age;
                try {
                    age = Integer.parseInt(strAge);
                } catch (NumberFormatException ex) {
                    warnings.append("\n* Invalid age, not a integer, skipping:" + line);
                    continue;
                }
                //
                Person p;
                try {
                    p = new Person(name, age, postalCode);
                } catch (IllegalArgumentException ex) {
                    warnings.append("\n* Exception creating Person from line: " + line);
                    warnings.append(ex.getMessage());
                    continue;
                }
                result.add(p);
            }
        }
        return result;
    }
}