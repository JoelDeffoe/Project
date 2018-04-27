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

namespace CopeOfThe_Tesher
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        // Size costs
        const double SIZE_SMALL = 1.00;
        const double SIZE_MEDIUM = 2.00;
        const double SIZE_LARGE = 3.00;

        // Flavour costs
        const double FLAVOUR_CHOCOLATE = 0.50;
        const double FLAVOUR_ROCKY_ROAD = 1.50;
        const double FLAVOUR_MINT_CHIP = 2.50;

        // Topping costs
        const double TOPPING_SMARTIES = 0.50;
        const double TOPPING_OREO = 1.50;
        const double TOPPING_SPRINKLES = 2.50;
        const double TOPPING_CARAMEL = 2.00;

        public MainWindow()
        {
            InitializeComponent();

            calculate();
        }

        private void calculate()
        {
            double cost = 0.00;

            if (rbtnSizeSmall.IsChecked == true)
            {
                cost += SIZE_SMALL;
            }
            else if (rbtnSizeMedium.IsChecked == true)
            {
                cost += SIZE_MEDIUM;
            }
            else
            {
                cost += SIZE_LARGE;
            }

            if (rbtnChocolate.IsChecked == true)
            {
                cost += FLAVOUR_CHOCOLATE;
            }
            else if (rbtnRockyRoad.IsChecked == true)
            {
                cost += FLAVOUR_ROCKY_ROAD;
            }
            else
            {
                cost += FLAVOUR_MINT_CHIP;
            }

            if (chkSmarties.IsChecked == true)
            {
                cost += TOPPING_SMARTIES;
            }

            if (chkOreo.IsChecked == true)
            {
                cost += TOPPING_OREO;
            }

            if (chkSprinkles.IsChecked == true)
            {
                cost += TOPPING_SPRINKLES;
            }

            if (chkCaramel.IsChecked == true)
            {
                cost += TOPPING_CARAMEL;
            }

            txtTotalCost.Text = cost.ToString("C");
        }

        private void iceCreamOption_Click(object sender, RoutedEventArgs e)
        {
            calculate();
        }
    }
}