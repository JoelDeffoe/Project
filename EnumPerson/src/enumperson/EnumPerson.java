/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package enumperson;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author ipd11
 */
class Person /*implements Comparable <Person> */{
	String name;
	Gender gender;
	AgeRange ageRange;	

    
	
	enum Gender { Male, Female, NA }
	enum AgeRange { Below18, From18to35, From35to65, Over65 }	
	
	@Override
	public String toString() {
        return String.format("%sis %s at %s",name, gender,ageRange);
        }
     /*   @Override
    public int compareTo(Person o) {
        int res=name.toLowerCase().compareTo(o.name.toLowerCase());
        if(res !=0){
        }
       return res;
    }*/
}
public class EnumPerson {
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws FileNotFoundException {
         ArrayList<Person>liste = new ArrayList <Person>();
        Scanner sc = new Scanner(new File("input.txt"));
        while(sc.hasNext()){
        String lin = sc.nextLine();
        String data[] = lin.split(";");
        Person p = new Person();
        p.name=data[0];
        p.gender = Person.Gender.valueOf(data[1]);
        p.ageRange = Person.AgeRange.valueOf(data[2]);
        liste.add(p);
        }
        for(Person p: liste){
        System.out.println(p);
        }
    }
}
