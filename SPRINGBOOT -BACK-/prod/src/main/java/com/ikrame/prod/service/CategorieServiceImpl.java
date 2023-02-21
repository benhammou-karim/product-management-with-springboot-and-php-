package com.ikrame.prod.service;

import com.ikrame.prod.entities.Categorie;
import com.ikrame.prod.repos.Categorierepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
@Service
public class CategorieServiceImpl implements CategorieService {
    @Autowired
    Categorierepository catRepository;


    @Override
    public Categorie saveCategorie(Categorie c) {
        return catRepository.save(c);
    }

    @Override
    public Categorie updateCategorie(Categorie c) {
        return catRepository.save(c);
    }

    @Override
    public void deleteCategoriet(Categorie c) {
        catRepository.delete(c);
    }

    @Override
    public void deleteCategorieById(Long id) {
        catRepository.deleteById(id);
    }

    @Override
    public Categorie getCategorie(Long id) {
        return catRepository.getById(id);
    }

    @Override
    public List<Categorie> getAllCategories() {
        return catRepository.findAll();
    }
}
