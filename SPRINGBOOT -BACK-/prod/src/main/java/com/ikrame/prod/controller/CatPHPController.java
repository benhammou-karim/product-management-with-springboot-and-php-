package com.ikrame.prod.controller;

import com.ikrame.prod.entities.Categorie;
import com.ikrame.prod.entities.User;
import com.ikrame.prod.repos.Categorierepository;
import com.ikrame.prod.service.CategorieService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.view.RedirectView;

import javax.servlet.http.HttpServletResponse;
import java.text.ParseException;

@RestController
@RequestMapping("phpcat")
@CrossOrigin
public class CatPHPController {
    @Autowired
    CategorieService catService;
    @GetMapping(value = "/saveCat/libelle/{libelle}")
    public void saveCat(HttpServletResponse httpServletResponse, @ModelAttribute("categorie") Categorie categorie, @PathVariable("libelle") String libelle) throws ParseException {

        categorie.setLibelle(libelle);


        Categorie saveCategorie = catService.saveCategorie(categorie);

        String url = "http://localhost/prod/list_cat.php";
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);

    }
    ///////////////
    @GetMapping("/supprimerCat/id/{id}")
    public void supprimerCat(@PathVariable("id") Long id, HttpServletResponse httpServletResponse) {
        catService.deleteCategorieById(id);
        String url = "http://localhost/prod/list_cat.php";
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);

    }
    ////////////////
    @RequestMapping("/modifierCat/id/{id}")
    public void editerCat(@PathVariable("id") Long id, HttpServletResponse httpServletResponse) {
        Categorie c = catService.getCategorie(id);
        String url = "http://localhost/prod/mod_cat.php?id=" + c.getId_cat() + "&libelle=" + c.getLibelle() + "&bool=" + 1;
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);
    }

    @RequestMapping("/updateCat")
    public RedirectView updateCat(@ModelAttribute("categorie") Categorie categorie) throws ParseException {
        catService.updateCategorie(categorie);
        RedirectView redirectView = new RedirectView();
        redirectView.setUrl("http://localhost/prod/list_cat.php");
        return redirectView;
    }
}
