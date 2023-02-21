package com.ikrame.prod;

import java.util.Date;


import java.util.List;

import com.ikrame.prod.entities.Categorie;
import com.ikrame.prod.entities.User;
import com.ikrame.prod.repos.Categorierepository;
import com.ikrame.prod.repos.UserRepository;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import com.ikrame.prod.entities.Produit;
import com.ikrame.prod.repos.Produitrepository;

@SpringBootTest
class ProdApplicationTests {

@Autowired
private Produitrepository produitRepository;
@Autowired
private UserRepository userrepository;
@Autowired
private Categorierepository catRepository;
@Test
public void testCreateProduit() {
Produit prod = new Produit("PC Dell",2200.500,"dell.jpg",new Date(), 1L);
produitRepository.save(prod);
    Produit prod1 = new Produit("PC MSI",20000.500,"msi.jpg",new Date(),3L);
    produitRepository.save(prod1);
    Produit prod2 = new Produit("PC ROG",18000.500,"rog.jpg",new Date(),4L);
    produitRepository.save(prod2);
    Produit prod3 = new Produit("PC LEGION",20000.500,"legion.jpg",new Date(),5L);
    produitRepository.save(prod3);
    Produit prod4 = new Produit("PC HP",5000.500,"pc_hp.jpg",new Date(),2L);
    produitRepository.save(prod4);
}
@Test
public void testListerTousProduits() {
    List<Produit> prods = produitRepository.findAll();
    for (Produit p : prods) {
        System.out.println(p);
    }
}
@Test
public void testCreateUser() {
    User a1 = new User("null","user@user.com", "user", 0L);
    User a2 = new User("null","admin@admin.com", "admin",1L);
    userrepository.save(a1);
    userrepository.save(a2);
}
@Test
    public void testListUser(){
    List<User> users = userrepository.findAll();
    for (User u : users){
        if(u.getMail().equals("user@user.com")){
            if(u.getPasswd().equals("user")){
                if(u.getAdmn()==1){
                    System.out.println("well done! u are admin");
                    break;
                }else{
                    System.out.println("well done! u are user");
                    break;
                }
            }else{
                System.out.println("password incorrect");
                break;
            }
        }
    }


}
@Test
    public void testCreateCategorie(){
    Categorie c = new Categorie( "DELL");
    catRepository.save(c);
    Categorie c4 = new Categorie( "HP");
    catRepository.save(c4);
    Categorie c1 = new Categorie( "MSI");
    catRepository.save(c1);
    Categorie c2 = new Categorie( "Rog");
    catRepository.save(c2);
    Categorie c3 = new Categorie( "Legion");
    catRepository.save(c3);
}
@Test
    public void testListCategorie(){
    List<Categorie> categories = catRepository.findAll();
    for (Categorie c : categories){
        System.out.println(c);
    }
}


}
