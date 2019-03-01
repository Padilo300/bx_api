Библиотека позволяет удобно работать с сущностями CRM и пользовательскими полями

    /* === методы для работы с сущностями  === */

    leadList($data)
    leadGet($id)
    leadAdd($data)
    leadUpdata($id, $arr)
    leadUF()    

    contactGet($id)
    contactAdd($data)  
    contactList($data)
    contactUpdate($id, $arr)

    dealUpdata($id, $arr)
    dealList($data)
    dealAdd($data, $phone)
    dealGet($id)

    diskFileGet($id)

    /* === методы для работы с полями ЛИДОВ  === */

    leadAdd($arr)
    leadUpdata($id, $arr )
    leadDelete($id)
    leadList()
    leadGet($id)

    /*  === методы для работы с полями КОНТАКТОВ  === */

    contactAdd($data)
    contactUpdata($id, $arr )
    contactList()
    contactGet($id)
    contactListIteamUpdata($listID, $iteamID, $newValue)
    contactListIteamDelete($listID, $iteamID)
    contactListIteamAdd($listID, $iteam)
    contactDelete($id)