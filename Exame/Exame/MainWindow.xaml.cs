using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace Exame
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        const Double APPLE = 0.50;
        const Double BANANA = 0.75;
        const Double ORENGE = 1.00;

        const Double CAROTE = 0.70;
        const Double POTATO= 1.25;
        const Double SPINISH= 0.95;

        const Double BEFF = 2.75;
        const Double CHIKEN = 4.00;
        const Double PORK  = 3.50;

        const Double MILK = 1.75;
        const Double CHEESE = 5.40;
        const Double CREAME = 2.50;

        public double cart = 0.00;

        public MainWindow()
        {
            InitializeComponent();
            
        }

      
         

        public void btnApple_Click(object sender, RoutedEventArgs e)
        {
            cart += APPLE;
            txtTotale.Text = cart.ToString("c");
        }
        private void btnBanana_Click(object sender, RoutedEventArgs e)
        {
            cart += BANANA;
            txtTotale.Text = cart.ToString("c");

        }
        private void btnOrange_Click(object sender, RoutedEventArgs e)
        {
            cart += ORENGE;
            txtTotale.Text = cart.ToString("c");
        }


        private void btnCarrote_Click(object sender, RoutedEventArgs e)
        {
            cart += CAROTE;
            txtTotale.Text = cart.ToString("c");
        }
        private void btnPatato_Click(object sender, RoutedEventArgs e)
        {
            cart += POTATO;
            txtTotale.Text = cart.ToString("c");
        }
        private void btnSpinach_Click(object sender, RoutedEventArgs e)
        {
            cart += SPINISH;
            txtTotale.Text = cart.ToString("c");
        }


        private void btnBeff_Click(object sender, RoutedEventArgs e)
        {
            cart += BEFF;
            txtTotale.Text = cart.ToString("c");
        }
        private void btnChicken_Click(object sender, RoutedEventArgs e)
        {
            cart += CHIKEN;
            txtTotale.Text = cart.ToString("c");
        }
        private void btnPork_Click(object sender, RoutedEventArgs e)
        {
            cart += PORK;
            txtTotale.Text = cart.ToString("c");
        }


        private void btnMilk_Click(object sender, RoutedEventArgs e)
        {
            cart += MILK;
            txtTotale.Text = cart.ToString("c");
        }
        private void btnCheese_Click(object sender, RoutedEventArgs e)
        {
            cart += CHEESE;
            txtTotale.Text = cart.ToString("c");
        }
        private void btnCream_Click(object sender, RoutedEventArgs e)
        {
            cart += CREAME;
            txtTotale.Text = cart.ToString("c");
        }
        
         

        private void btnChekout_Click(object sender, RoutedEventArgs e)
        {
            if (rbtnCarte.IsChecked == true)
            {
                txtbPaimant.IsEnabled = false;
               
            }
            else if (rbtnCache.IsChecked == true)
            {
                txtbPaimant.IsEnabled = true;

            }
            else
            {
                MessageBox.Show(" selcet payment option ");
            }



        }

       
        private void btnReset_Click(object sender, RoutedEventArgs e)
        {
            cart = cart - cart;
            txtTotale.Text = cart.ToString("c");
        }
    }
}
