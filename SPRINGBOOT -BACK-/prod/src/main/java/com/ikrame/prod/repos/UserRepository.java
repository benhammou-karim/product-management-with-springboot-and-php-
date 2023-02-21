package com.ikrame.prod.repos;

import com.ikrame.prod.entities.User;
import org.springframework.data.jpa.repository.JpaRepository;

public interface UserRepository extends JpaRepository<User, Long>{
}
