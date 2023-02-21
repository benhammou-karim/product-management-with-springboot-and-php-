package com.ikrame.prod.entities;

import java.util.Date;

import javax.persistence.*;

@Entity
public class Produit {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long idProduit;
    private String nomProduit;
    private Double prixProduit;
    private String image;
    private Date dateCreation;
    @Column(name = "from_cat_id")
    private Long id_cat;

    public Produit() {
        super();
    }
    public Produit(String nomProduit, Double prixProduit,String image, Date dateCreation, Long id_cat) {
        super();
        this.nomProduit = nomProduit;
        this.prixProduit = prixProduit;
        this.image=image;
        this.dateCreation = dateCreation;
        this.id_cat=id_cat;
    }
    public Long getIdProduit() {
        return idProduit;
    }
    public void setIdProduit(Long idProduit) {
        this.idProduit = idProduit;
    }
    public String getNomProduit() {
        return nomProduit;
    }
    public void setNomProduit(String nomProduit) {
        this.nomProduit = nomProduit;
    }
    public Double getPrixProduit() {
        return prixProduit;
    }
    public void setPrixProduit(Double prixProduit) {
        this.prixProduit = prixProduit;
    }
    public Date getDateCreation() {
        return dateCreation;
    }
    public void setDateCreation(Date dateCreation) {
        this.dateCreation = dateCreation;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public Long getId_cat() {
        return id_cat;
    }

    public void setId_cat(Long id_cat) {
        this.id_cat = id_cat;
    }

    @Override
    public String toString() {
        return "Produit [idProduit=" + idProduit + ", nomProduit=" + nomProduit + ", prixProduit=" + prixProduit
                + ", image=" + image +"dateCreation=" + dateCreation + "id_cat = "+id_cat+"]";
    }
}