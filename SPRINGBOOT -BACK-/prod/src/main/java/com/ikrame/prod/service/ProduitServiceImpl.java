package com.ikrame.prod.service;
import com.ikrame.prod.entities.Produit;
import com.ikrame.prod.repos.Produitrepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
@Service
public class ProduitServiceImpl implements ProduitService{

@Autowired
    Produitrepository produitrepository;

    @Override
    public Produit saveProduit(Produit p) {
        return produitrepository.save(p);
    }

    @Override
    public Produit updateProduit(Produit p) {
        return produitrepository.save(p);
    }

    @Override
    public void deleteProduit(Produit p) {
         produitrepository.delete(p);
    }

    @Override
    public void deleteProduitById(Long id) {
         produitrepository.deleteById(id);
    }

    @Override
    public Produit getProduit(Long id) {
        return produitrepository.getById(id);
    }

    @Override
    public List<Produit> getAllProduits() {
        return produitrepository.findAll();
    }
}
