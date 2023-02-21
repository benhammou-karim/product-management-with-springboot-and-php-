package com.ikrame.prod.entities;

import javax.persistence.*;
import java.util.List;

@Entity
public class Categorie {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id_cat;
    private String libelle;
    @OneToMany(cascade = CascadeType.ALL, targetEntity = Produit.class)
    @JoinColumn(name = "to_prod_id")
    private List<Produit> Produits;
    public Categorie(){ super();}
    public Categorie(String Libelle){
        super();
        this.libelle=Libelle;

    }

    public Long getId_cat() {
        return id_cat;
    }

    public void setId_cat(Long id_cat) {
        this.id_cat = id_cat;
    }

    public String getLibelle() {
        return libelle;
    }

    public void setLibelle(String libelle) {
        this.libelle = libelle;
    }
    public String toString(){
        return "[ id_cat= " + id_cat + "libelle= "+ libelle+"]";
    }

}
