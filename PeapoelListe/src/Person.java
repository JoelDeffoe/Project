/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ipd11
 */
public class Person {

    public Person(String name, int age, String postalCode) {
        setName(name);
        setAge(age);
        setPostalCode(postalCode);
    }
    
    
    private String name;
    private int age;
    private String postalCode;
    
    @Override
    public String toString(){
    return String.format("%sis %d y/o at %s",name, age,postalCode);
        
    }

    public String getName() {
        
        return name;
    }

    public final void setName(String name) {
        if (name.length()<1||name.length()>50||name.contains(";")){
            throw new IllegalArgumentException("Name must be between 1 and 50 charater long  and no semicolon");
        }
        this.name = name;
    }

    public int getAge() {
        return age;
    }

    public final void setAge(int age) {
        if (age < 1 || age > 150){
        throw new  IllegalArgumentException("Name must be between 1 and 150 ");
        }
        this.age = age;
    }

    public String getPostalcode() {
        return postalCode;
    }

    public void setPostalCode(String postalCode) {
         if(!postalCode.matches("^[A-Z][0-9][A-Z] [0-9][A-Z][0-9]$")){
        throw new  IllegalArgumentException("postal code mus be in format A1A 1A1 ");
    };
        this.postalCode = postalCode;
    }

   
    
}
