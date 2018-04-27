/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


package effectiveSorting;

import java.util.ArrayList;
import java.util.Collections;

class Person implements Comparable <Person> {
	
    String name;
	int age;
	Person (String name, int age) {
		this.name = name;
		this.age = age;
	}


    @Override 
    public String toString(){
        return name + "-"+ age;
    }

    @Override
    public int compareTo(Person o) {
         return age - o.age;
    }
}

public class EffectiveSorting {
    public static void main(String[] args) {
        ArrayList<Person> people=new ArrayList<Person>();
        people.add(new Person("leo", 10));
        people.add(new Person("reo", 50));
        people.add(new Person("jeo", 140));
        people.add(new Person("meo", 130));
        people.add(new Person("rick", 40));
        System.out.print("originale");
        for (Person p: people){
            System.out.print(p +",");
        }
        System.out.println("");
        Collections.sort(people);
        System.out.print("age ");
        for (Person p: people){
            System.out.print(p +",");
        }
        System.out.println("");
    }
}
