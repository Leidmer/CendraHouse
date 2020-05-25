/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Entitats;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Sethei
 */
@Entity
@Table(name = "types")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Types.findAll", query = "SELECT t FROM Types t"),
    @NamedQuery(name = "Types.findById", query = "SELECT t FROM Types t WHERE t.id = :id"),
    @NamedQuery(name = "Types.findByModule", query = "SELECT t FROM Types t WHERE t.module = :module"),
    @NamedQuery(name = "Types.findByName", query = "SELECT t FROM Types t WHERE t.name = :name"),
    @NamedQuery(name = "Types.findBySlug", query = "SELECT t FROM Types t WHERE t.slug = :slug"),
    @NamedQuery(name = "Types.findByIcona", query = "SELECT t FROM Types t WHERE t.icona = :icona"),
    @NamedQuery(name = "Types.findByDeletedAt", query = "SELECT t FROM Types t WHERE t.deletedAt = :deletedAt"),
    @NamedQuery(name = "Types.findByCreatedAt", query = "SELECT t FROM Types t WHERE t.createdAt = :createdAt"),
    @NamedQuery(name = "Types.findByUpdatedAt", query = "SELECT t FROM Types t WHERE t.updatedAt = :updatedAt")})
public class Types implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Basic(optional = false)
    @Column(name = "id")
    private Long id;
    @Basic(optional = false)
    @Column(name = "module")
    private int module;
    @Basic(optional = false)
    @Column(name = "name")
    private String name;
    @Basic(optional = false)
    @Column(name = "slug")
    private String slug;
    @Basic(optional = false)
    @Column(name = "icona")
    private String icona;
    @Column(name = "deleted_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date deletedAt;
    @Column(name = "created_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date createdAt;
    @Column(name = "updated_at")
    @Temporal(TemporalType.TIMESTAMP)
    private Date updatedAt;

    public Types() {
    }

    public Types(Long id) {
        this.id = id;
    }

    public Types(Long id, int module, String name, String slug, String icona) {
        this.id = id;
        this.module = module;
        this.name = name;
        this.slug = slug;
        this.icona = icona;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public int getModule() {
        return module;
    }

    public void setModule(int module) {
        this.module = module;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSlug() {
        return slug;
    }

    public void setSlug(String slug) {
        this.slug = slug;
    }

    public String getIcona() {
        return icona;
    }

    public void setIcona(String icona) {
        this.icona = icona;
    }

    public Date getDeletedAt() {
        return deletedAt;
    }

    public void setDeletedAt(Date deletedAt) {
        this.deletedAt = deletedAt;
    }

    public Date getCreatedAt() {
        return createdAt;
    }

    public void setCreatedAt(Date createdAt) {
        this.createdAt = createdAt;
    }

    public Date getUpdatedAt() {
        return updatedAt;
    }

    public void setUpdatedAt(Date updatedAt) {
        this.updatedAt = updatedAt;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Types)) {
            return false;
        }
        Types other = (Types) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "Entitats.Types[ id=" + id + " ]";
    }
    
}
