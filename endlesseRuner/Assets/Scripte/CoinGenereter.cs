using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CoinGenereter : MonoBehaviour {

    public ObjectPouler coinPool;
    public float distaceBetweenCoin;

    public void SpawnCoins(Vector3 startePosition)
    {
        GameObject coin1 = coinPool.GetPooledObject();
        coin1.transform.position = startePosition;
        coin1.SetActive(true);

        GameObject coin2 = coinPool.GetPooledObject();
        coin2.transform.position = new Vector3(startePosition.x - distaceBetweenCoin,startePosition.y,startePosition.z);
        coin2.SetActive(true);

        GameObject coin3 = coinPool.GetPooledObject();
        coin3.transform.position = new Vector3(startePosition.x + distaceBetweenCoin, startePosition.y, startePosition.z);
        coin3.SetActive(true);


    }

}
