<?php

namespace ContentEgg\application\modules\CjLinks;

use ContentEgg\application\components\AffiliateParserModuleConfig;

/**
 * CjLinksConfig class file
 *
 * @author keywordrush.com <support@keywordrush.com>
 * @link http://www.keywordrush.com/
 * @copyright Copyright &copy; 2015 keywordrush.com
 */
class CjLinksConfig extends AffiliateParserModuleConfig {

    public function options()
    {
        $options = array(
            'access_token' => array(
                'title' => 'Personal access token <span class="cegg_required">*</span>',
                'description' => __('A Personal Access Token is a unique identification string for your account. You can get it <a target="_blank" href="https://developers.cj.com/account/personal-access-tokens">here</a>.', 'content-egg'),
                'callback' => array($this, 'render_input'),
                'default' => '',
                'validator' => array(
                    'trim',
                    array(
                        'call' => array('\ContentEgg\application\helpers\FormValidator', 'required'),
                        'when' => 'is_active',
                        'message' => sprintf(__('The field "%s" can not be empty.', 'content-egg'), 'Personal access token'),
                    ),
                ),
                'section' => 'default',
            ),
            'website_id' => array(
                'title' => 'Website ID <span class="cegg_required">*</span>',
                'description' => __('PID - site id in CJ. Login in your account in CJ and follow "Account -> Websites"', 'content-egg'),
                'callback' => array($this, 'render_input'),
                'default' => '',
                'validator' => array(
                    'trim',
                    array(
                        'call' => array('\ContentEgg\application\helpers\FormValidator', 'required'),
                        'when' => 'is_active',
                        'message' => __('The field "Website ID" can not be empty.', 'content-egg'),
                    ),
                ),
                'section' => 'default',
            ),
            'dev_key' => array(
                'title' => 'Developer key (deprecated)',
                'description' => __('Developer keys have been deprecated. They will continue to work when authenticating with existing APIs, but will not work with future APIs. Please use personal access tokens instead.', 'content-egg'),
                'callback' => array($this, 'render_input'),
                'default' => '',
                'validator' => array(
                    'trim',
                ),
                'section' => 'default',
            ),
            'entries_per_page' => array(
                'title' => __('Results', 'content-egg'),
                'description' => __('Number of results for one search query.', 'content-egg'),
                'callback' => array($this, 'render_input'),
                'default' => 10,
                'validator' => array(
                    'trim',
                    'absint',
                ),
                'section' => 'default',
            ),
            'entries_per_page_update' => array(
                'title' => __('Results for updates ', 'content-egg'),
                'description' => __('Number of results for automatic updates and autoblogging.', 'content-egg'),
                'callback' => array($this, 'render_input'),
                'default' => 3,
                'validator' => array(
                    'trim',
                    'absint',
                ),
                'section' => 'default',
            ),
            'advertiser_ids' => array(
                'title' => __('Advertisers', 'content-egg'),
                'description' => 'Вы можете задать Adverticer ID (CID) через запятую для ограничения поиска только по этим рекламодателям. Введите "joined", чтобы искать по всем вашим рекламодателям.',
                'callback' => array($this, 'render_input'),
                'default' => 'joined',
                'validator' => array(
                    'trim',
                ),
                'section' => 'default',
            ),
            'link_type' => array(
                'title' => 'Link type',
                'description' => '',
                'callback' => array($this, 'render_dropdown'),
                'dropdown_options' => array(
                    '' => __('Any', 'content-egg'),
                    'Text Link' => 'Text Link',
                    'Banner' => 'Banner',
                    'Content Link' => 'Content Link',
                    'Advanced Link' => 'Advanced Link',
                    'Flash Link' => 'Flash Link',
                //'SmartLink' => 'SmartLink',
                //'Product Catalog' => 'Product Catalog',
                //'Advertiser SmartZone' => 'Advertiser SmartZone',
                //'Lead Form' => 'Lead Form',
                //'Placement Text Link' => 'Placement Text Link',
                //'Placement Banner' => 'Placement Banner',
                //'Branded Placement Text Link' => 'Branded Placement Text Link',
                //'Branded Placement Banner' => 'Branded Placement Banner',
                ),
                'default' => 'Text Link',
                'section' => 'default',
                'metaboxInit' => true,
            ),
            'promotion_type' => array(
                'title' => 'Promotion type',
                'description' => '',
                'callback' => array($this, 'render_dropdown'),
                'dropdown_options' => array(
                    '' => __('Any', 'content-egg'),
                    'coupon' => 'Coupon',
                    'sweepstakes' => 'Sweepstakes',
                    'product' => 'Hot Product',
                    'sale/discount' => 'Sale/Discount',
                    'free shipping' => 'Free shipping',
                    'seasonal link' => 'Seasonal link',
                ),
                'default' => '',
                'section' => 'default',
                'metaboxInit' => true,
            ),
            'category' => array(
                'title' => __('Category ', 'content-egg'),
                'description' => '',
                'callback' => array($this, 'render_dropdown'),
                'dropdown_options' => array(
                    '' => __('Any', 'content-egg'),
                    'Accessories' => 'Accessories',
                    'Air' => 'Air',
                    'Apparel' => 'Apparel',
                    'Art' => 'Art',
                    'Art/Photo/Music' => 'Art/Photo/Music',
                    'Astrology' => 'Astrology',
                    'Auction' => 'Auction',
                    'Audio Books' => 'Audio Books',
                    'Automotive' => 'Automotive',
                    'Autumn' => 'Autumn',
                    'Babies' => 'Babies',
                    'Back to School' => 'Back to School',
                    'Banking/Trading' => 'Banking/Trading',
                    'Bath & Body' => 'Bath & Body',
                    'Beauty' => 'Beauty',
                    'Bed & Bath' => 'Bed & Bath',
                    'Betting/Gaming' => 'Betting/Gaming',
                    'Black Friday/Cyber Monday' => 'Black Friday/Cyber Monday',
                    'Blogs' => 'Blogs',
                    'Books' => 'Books',
                    'Books/Media' => 'Books/Media',
                    'Broadband' => 'Broadband',
                    'Business' => 'Business',
                    'Business-to-Business' => 'Business-to-Business',
                    'Buying and Selling' => 'Buying and Selling',
                    'Camping and Hiking' => 'Camping and Hiking',
                    'Car' => 'Car',
                    'Careers' => 'Careers',
                    'Cars & Trucks' => 'Cars & Trucks',
                    'Charitable Organizations' => 'Charitable Organizations',
                    'Children' => 'Children',
                    'Children\'s' => 'Children\'s',
                    'Christmas' => 'Christmas',
                    'Classifieds' => 'Classifieds',
                    'Clothing/Apparel' => 'Clothing/Apparel',
                    'Collectibles' => 'Collectibles',
                    'Collectibles and Memorabilia' => 'Collectibles and Memorabilia',
                    'College' => 'College',
                    'Commercial' => 'Commercial',
                    'Communities' => 'Communities',
                    'Computer & Electronics' => 'Computer & Electronics',
                    'Computer HW' => 'Computer HW',
                    'Computer SW' => 'Computer SW',
                    'Computer Support' => 'Computer Support',
                    'Construction' => 'Construction',
                    'Consumer Electronics' => 'Consumer Electronics',
                    'Cosmetics' => 'Cosmetics',
                    'Credit Cards' => 'Credit Cards',
                    'Credit Reporting and Repair' => 'Credit Reporting and Repair',
                    'Department Stores' => 'Department Stores',
                    'Department Stores/Malls' => 'Department Stores/Malls',
                    'Discounts' => 'Discounts',
                    'Domain Registrations' => 'Domain Registrations',
                    'E-commerce Solutions/Providers' => 'E-commerce Solutions/Providers',
                    'Easter' => 'Easter',
                    'Education' => 'Education',
                    'Electronic Games' => 'Electronic Games',
                    'Electronic Toys' => 'Electronic Toys',
                    'Email Marketing' => 'Email Marketing',
                    'Employment' => 'Employment',
                    'Energy Saving' => 'Energy Saving',
                    'Entertainment' => 'Entertainment',
                    'Equipment' => 'Equipment',
                    'Events' => 'Events',
                    'Exercise & Health' => 'Exercise & Health',
                    'Family' => 'Family',
                    'Father\'s Day' => 'Father\'s Day',
                    'Financial Services' => 'Financial Services',
                    'Flowers' => 'Flowers',
                    'Food & Drinks' => 'Food & Drinks',
                    'Fragrance' => 'Fragrance',
                    'Fundraising' => 'Fundraising',
                    'Furniture' => 'Furniture',
                    'Games' => 'Games',
                    'Games & Toys' => 'Games & Toys',
                    'Garden' => 'Garden',
                    'Gifts' => 'Gifts',
                    'Gifts & Flowers' => 'Gifts & Flowers',
                    'Golf' => 'Golf',
                    'Gourmet' => 'Gourmet',
                    'Green' => 'Green',
                    'Greeting Cards' => 'Greeting Cards',
                    'Groceries' => 'Groceries',
                    'Guides' => 'Guides',
                    'Halloween' => 'Halloween',
                    'Handbags' => 'Handbags',
                    'Health Food' => 'Health Food',
                    'Health and Wellness' => 'Health and Wellness',
                    'Home & Garden' => 'Home & Garden',
                    'Home Appliances' => 'Home Appliances',
                    'Hotel' => 'Hotel',
                    'Insurance' => 'Insurance',
                    'Internet Service Providers' => 'Internet Service Providers',
                    'Investment' => 'Investment',
                    'Jewelry' => 'Jewelry',
                    'Kitchen' => 'Kitchen',
                    'Languages' => 'Languages',
                    'Legal' => 'Legal',
                    'Luggage' => 'Luggage',
                    'Magazines' => 'Magazines',
                    'Malls' => 'Malls',
                    'Marketing' => 'Marketing',
                    'Matchmaking' => 'Matchmaking',
                    'Memorabilia' => 'Memorabilia',
                    'Men\'s' => 'Men\'s',
                    'Military' => 'Military',
                    'Mobile Entertainment' => 'Mobile Entertainment',
                    'Mortgage Loans' => 'Mortgage Loans',
                    'Mother\'s Day' => 'Mother\'s Day',
                    'Motorcycles' => 'Motorcycles',
                    'Music' => 'Music',
                    'Network Marketing' => 'Network Marketing',
                    'New Year\'s Resolution' => 'New Year\'s Resolution',
                    'New/Used Goods' => 'New/Used Goods',
                    'News' => 'News',
                    'Non-Profit' => 'Non-Profit',
                    'Nutritional Supplements' => 'Nutritional Supplements',
                    'Office' => 'Office',
                    'Online Services' => 'Online Services',
                    'Online/Wireless' => 'Online/Wireless',
                    'Outdoors' => 'Outdoors',
                    'Parts & Accessories' => 'Parts & Accessories',
                    'Party Goods' => 'Party Goods',
                    'Peripherals' => 'Peripherals',
                    'Personal Insurance' => 'Personal Insurance',
                    'Personal Loans' => 'Personal Loans',
                    'Pets' => 'Pets',
                    'Pharmaceuticals' => 'Pharmaceuticals',
                    'Phone Card Services' => 'Phone Card Services',
                    'Photo' => 'Photo',
                    'Productivity Tools' => 'Productivity Tools',
                    'Professional' => 'Professional',
                    'Professional Sports Organizations' => 'Professional Sports Organizations',
                    'Real Estate' => 'Real Estate',
                    'Real Estate Services' => 'Real Estate Services',
                    'Recreation & Leisure' => 'Recreation & Leisure',
                    'Recycling' => 'Recycling',
                    'Rentals' => 'Rentals',
                    'Restaurants' => 'Restaurants',
                    'Search Engine' => 'Search Engine',
                    'Seasonal' => 'Seasonal',
                    'Self Help' => 'Self Help',
                    'Services' => 'Services',
                    'Shoes' => 'Shoes',
                    'Sports' => 'Sports',
                    'Sports & Fitness' => 'Sports & Fitness',
                    'Spring' => 'Spring',
                    'Summer' => 'Summer',
                    'Summer Sports' => 'Summer Sports',
                    'Tax Season' => 'Tax Season',
                    'Tax Services' => 'Tax Services',
                    'Teens' => 'Teens',
                    'Telecommunications' => 'Telecommunications',
                    'Telephone Services' => 'Telephone Services',
                    'Television' => 'Television',
                    'Tobacco' => 'Tobacco',
                    'Tools and Supplies' => 'Tools and Supplies',
                    'Toys' => 'Toys',
                    'Travel' => 'Travel',
                    'Utilities' => 'Utilities',
                    'Vacation' => 'Vacation',
                    'Valentine\'s Day' => 'Valentine\'s Day',
                    'Videos/Movies' => 'Videos/Movies',
                    'Virtual Malls' => 'Virtual Malls',
                    'Vision Care' => 'Vision Care',
                    'Water Sports' => 'Water Sports',
                    'Web Design' => 'Web Design',
                    'Web Hosting/Servers' => 'Web Hosting/Servers',
                    'Web Tools' => 'Web Tools',
                    'Weddings' => 'Weddings',
                    'Weight Loss' => 'Weight Loss',
                    'Wellness' => 'Wellness',
                    'Wine & Spirits' => 'Wine & Spirits',
                    'Winter' => 'Winter',
                    'Winter Sports' => 'Winter Sports',
                    'Women\'s' => 'Women\'s',
                ),
                'default' => '',
                'section' => 'default',
            ),
        );
        $parent = parent::options();
        unset($parent['featured_image']);
        return array_merge($parent, $options);
    }

}
