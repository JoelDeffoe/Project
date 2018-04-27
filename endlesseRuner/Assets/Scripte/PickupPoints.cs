using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PickupPoints : MonoBehaviour {

    public int scoreToGive;
    private ScoreManager theScoreManagar;
    private AudioSource coinSound;

	// Use this for initialization
	void Start () {
        theScoreManagar = FindObjectOfType<ScoreManager>();
        coinSound = GameObject.Find ("CoinSound").GetComponent<AudioSource>();
	}
	
	// Update is called once per frame
	void Update () {
		
	}
    private void OnTriggerEnter2D(Collider2D other)
    {
        if (other.gameObject.name == "Player")
        {
            theScoreManagar.AddScore(scoreToGive);
            gameObject.SetActive(false);
            if (coinSound.isPlaying)

                coinSound.Stop();
            coinSound.Play();

        }
        else
        {
            coinSound.Play();
        }
        
    }
}
