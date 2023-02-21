package com.ikrame.prod.entities;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
@Entity
public class User {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id_user;
    private String image;
    private String mail;
    private String passwd;
    private Long admn;
    public User(){
        super();
    }
    public User(String image, String mail, String passwd, Long admn){
        super();

        this.image=image;
        this.mail=mail;
        this.passwd=passwd;
        this.admn=admn;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public String getMail() {
        return mail;
    }

    public Long getId_user() {
        return id_user;
    }

    public String getPasswd() {
        return passwd;
    }

    public void setId_user(Long id_user) {
        this.id_user = id_user;
    }

    public void setMail(String mail) {
        this.mail = mail;
    }

    public Long getAdmn() {
        return admn;
    }

    public void setAdmn(Long admn) {
        this.admn = admn;
    }

    public void setPasswd(String passwd) {
        this.passwd = passwd;
    }
    @Override
    public String toString() {
        return "Admin [id_user=" + id_user + " image= "+ image +", mail=" + mail + ", pass=" + passwd
                 +", admin="+admn+ "]";
    }
}
