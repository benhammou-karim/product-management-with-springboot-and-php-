package com.ikrame.prod.controller;

import com.ikrame.prod.entities.Produit;
import com.ikrame.prod.service.ProduitService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.view.RedirectView;

import javax.servlet.http.HttpServletResponse;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;


@RestController
@RequestMapping("/php")
@CrossOrigin
public class apiPHP {
    @Autowired
    ProduitService produitService;

    @GetMapping(value = "/saveProd/nom/{nom}/prix/{prix}/date/{date}/image/{image}")
    public void saveProduit(HttpServletResponse httpServletResponse, @ModelAttribute("produit") Produit produit, @PathVariable("nom") String nom, @PathVariable("image") String image, @PathVariable("date") String date, @PathVariable("prix") double prix) throws ParseException {
        SimpleDateFormat dateformat = new SimpleDateFormat("yyyy-MM-dd");
        Date dateCreation = dateformat.parse(String.valueOf(date));
        produit.setImage(image);
        produit.setDateCreation(dateCreation);
        produit.setNomProduit(nom);
        produit.setPrixProduit(prix);

        Produit saveProduit = produitService.saveProduit(produit);

        String url = "http://localhost/prod/list.php";
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);

    }
///////////////////////
    @GetMapping("/supprimerProd/id/{id}")
    public void supprimerProduit(@PathVariable("id") Long id, HttpServletResponse httpServletResponse) {
        produitService.deleteProduitById(id);
        String url = "http://localhost/prod/list.php";
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);

    }
/////////////////////////////
    @RequestMapping("/modifierProd/id/{id}")
    public void editerProduit(@PathVariable("id") Long id, HttpServletResponse httpServletResponse) {
        Produit p = produitService.getProduit(id);
        String url = "http://localhost/prod/mod.php?id=" + p.getIdProduit() + "&nom=" + p.getNomProduit() + "&prix=" + p.getPrixProduit() + "&date=" + p.getDateCreation()+ "&image=" + p.getImage()+ "&bool=" + 1;
        httpServletResponse.setHeader("Location", url);
        httpServletResponse.setStatus(302);
    }

    @RequestMapping("/updateProd")
    public RedirectView updateProduit(@ModelAttribute("produit") Produit produit,
                                      @RequestParam("date") String date, ModelMap modelMap) throws ParseException {
        SimpleDateFormat dateformat = new SimpleDateFormat("yyyy-MM-dd");
        Date dateCreation = dateformat.parse(String.valueOf(date));
        produit.setDateCreation(dateCreation);
        produitService.updateProduit(produit);
        RedirectView redirectView = new RedirectView();
        redirectView.setUrl("http://localhost/prod/list.php");
        return redirectView;
    }
}
