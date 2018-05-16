namespace MvcMusicStore.Models
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class Genre
    {
    
        public Genre()
        {
            Albums = new HashSet<Album>();
        }

        public int GenreId { get; set; }

        [StringLength(120)]
        public string Name { get; set; }

        [StringLength(4000)]
        public string Description { get; set; }

     
        public virtual ICollection<Album> Albums { get; set; }
    }
}
