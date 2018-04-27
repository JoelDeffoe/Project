using System.Data.Entity;

namespace MvcMusicStore.Models
{
    public class MusicStoreEntities : DbContext
    {
        public DbSet<Album> Albums { get; set; }
        public DbSet<Genre> Genres { get; set; }
        public DbSet<Artist> Artists { get; set; }
        public DbSet<Cart> Carts { get; set; }
        public DbSet<Order> Orders { get; set; }
        public DbSet<RegisterUser>Users { get; set; }
       // public DbSet<ChangePasswordModel> UserPasswords { get; set; }


        public DbSet<OrderDetail> OrderDetails { get; set; }
        public object ObjectStateManager { get; internal set; }
    }
}