package com.ikrame.prod.repos;

import org.springframework.data.jpa.repository.JpaRepository;
        import com.ikrame.prod.entities.Produit;
public interface Produitrepository extends JpaRepository<Produit, Long>{

}
