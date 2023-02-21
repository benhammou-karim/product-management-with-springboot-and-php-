package com.ikrame.prod.service;
import com.ikrame.prod.entities.Categorie;
import java.util.List;

public interface CategorieService {
    Categorie saveCategorie(Categorie c);
    Categorie updateCategorie(Categorie c);
    void deleteCategoriet(Categorie c);
    void deleteCategorieById(Long id);
    Categorie getCategorie(Long id);
    List<Categorie> getAllCategories();

}
